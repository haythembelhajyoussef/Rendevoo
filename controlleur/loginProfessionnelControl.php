<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../include/Mail.php';
$usertests = $em->getRepository('User')->findAll();
$spec = isset($_GET['specialite']) ? $_GET['specialite'] : null;
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%ADMIN%'");
$admins = $query->getResult();

$today = date("F/j/Y g:i a");
$user = new User();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitsubscribe'])) {
    if (!is_uploaded_file($_FILES['fichier']['tmp_name'])) {
        $URL = 'assets/userImage/no-photo.png';
    } else {
        $content_dir = 'assets/userImage/'; // dossier où sera déplacé le fichier

        $tmp_file = $_FILES['fichier']['tmp_name'];

        // on vérifie maintenant l'extension
        $type_file = $_FILES['fichier']['type'];

        if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {

            $erreurs[] = "Le fichier n'est pas une image";
        }

        // on copie le fichier dans le dossier de destination
        $name_file = $_FILES['fichier']['name'];
        if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
            exit("Impossible de copier le fichier dans $content_dir");
        }
        $URL = $content_dir . $name_file;
    }

    $user->chargement($_POST['user']);
    foreach ($usertests as $usertest) {
        if ($user->getEmail() == $usertest->getEmail()) {

            $erreurs[] = "Vous avez déja un autre compte";
        }
    }

    if (empty($erreurs)) {
        $user->setRole(["PROFESSIONNEL"]);
        $user->setAvatar($URL);
//        $erreurs = array_merge($erreurs, $user->getErreurs());
        if ($user->isValide()) {

            $professionnel = new Professionnel();
            $professionnel->setUser($user);
            $professionnel->setDescription($_POST['description']);
            $specialite = $em->getRepository('Specialite')->find($_POST['specialite']);
            $professionnel->setSpecialite($specialite);


            $calendrier = new Calendrier();
            $calendrier->setProfessionnel($professionnel);
            $calendrier->setDuree('0');
            $professionnel->setCalendrier($calendrier);

            $localisation = new Localisation();
            $professionnel->setLocalisation($localisation);
            $localisation->setLongetude($_POST['lng']);
            $localisation->setLatitude($_POST['lat']);

            $em->persist($professionnel);

            foreach ($admins as $admin) {
                $notif = new Notification();
                $notif->setDate(new DateTime);
                $notif->setEtat(false);
                $notif->setMessage("Un nouveau professionnel a été inscrit");
                $notif->setUser($admin);

                $em->persist($notif);
            }

            $em->flush();

            $mail = new Mail();
            $mail->Send($user->getEmail(), "Confirmation d'enregistrement", "<html>
<body>
Confirmation d'enregistrement:<br><br>
<hr>
Nom et Prénom: " . $user->getNom() . ' ' . $user->getPrenom() . "<br>
Email: " . $user->getEmail() . "<br>
<br>
Date: " . $today . " <br>
<br>
un administrateur vous va vous contacter pour l'activation de ton compte       
						<br /><br />
						Merci,
<hr>
</body>
</html>");

            header('Location: apresInscriptionP');
        }
    }
}
$email = "";
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitconnect'])) {

    $email = $_POST['email'];
    $query = $em->createQuery('SELECT u FROM User u WHERE u.email = :email  AND u.password = :password AND u.role like :role AND u.etat = :etat');
    $query->setParameters(array(
        'email' => $email,
        'password' => md5($_POST['password']),
        'role' => "%PROFESSIONNEL%",
        'etat' => '1'
    ));
    $users = $query->getResult();


    if (!empty($users)) {
        $user = new User();
        $user->setNom($users[0]->getNom());
        $user->setPrenom($users[0]->getPrenom());
        $user->setEmail($users[0]->getEmail());
        $user->setPassword($users[0]->getPassword());
        $user->setRole($users[0]->getRole());
        $user->setId($users[0]->getId());

        $_SESSION['user'] = $user;

        header('Location: index');
    } else {
        $erreurs[] = "Vérifier votre email et mot de passe!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitforgot'])) {
    $password = mdpAlea(8);
    $email = $_POST['email'];

    $user = $em->getRepository('User')->findByEmail($email);
    $user[0]->setPassword($password);

    $em->flush();
    $mail = new Mail();
    $mail->Send($email, "Rappel mot de passe", "<html>
<body>
réinitialisation du mot de passe :<br><br>
___________________________________________________________________<br>
Nom et Prénom: " . $user[0]->getNom() . ' ' . $user[0]->getPrenom() . "<br>
Email: " . $user[0]->getEmail() . "<br>
nouveau mot de passe: $password <br>
Date de réinitialisation de mot de passe :  $today  <br>
<br>
Nous avons demandé de réinitialiser votre mot de passe, Si vous souhaitez vous connecter à nouveau, cliquez sur le lien suivant, si non juste ignorez cet email,
				   <br /><br />
				   Cliquez sur le lien suivant pour vous connecter à nouveau 
				   <br /><br />
				   <a href=http://localhost/rdv/loginProfessionnel>Cliquez ici pour vous connecter à nouveau</a>
				   <br /><br />
				   Merci :)
				   
____________________________________________________________________<br>
</body>
</html>");
}



    