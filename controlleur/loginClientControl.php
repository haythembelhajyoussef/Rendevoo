<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../include/Mail.php';

$usertests = $em->getRepository('User')->findAll();
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%ADMIN%'");
$admins = $query->getResult();

function mdpAlea($length) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);
    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}

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
    $erreurs = $user->getErreurs();
    $erreurs = array_merge($erreurs, $user->getErreurs());
    if (empty($erreurs)) {
        $user->setRole(["CLIENT"]);
        $user->setAvatar($URL);

        if ($user->isValide()) {
            $client = new Client();
            $client->setUser($user);
            $em->persist($client);

            foreach ($admins as $admin) {
                $notif = new Notification();
                $notif->setDate(new DateTime);
                $notif->setEtat(false);
                $notif->setMessage("Un nouveau client a été inscrit");
                $notif->setUser($admin);

                $em->persist($notif);
            }
            $em->flush();

            $mail = new Mail();
            $mail->Send($user->getEmail(), "Confirmation d'enregistrement", "<html>
<body>
Confirmation d'enregistrement:<br><br>
___________________________________________________________________<br>
Nom et Prénom: " . $user->getNom() . ' ' . $user->getPrenom() . "<br>
Email: " . $user->getEmail() . "<br>
<br>
Date: " . $today . " <br>
<br>
Pour compléter votre inscription, Veuillez cliquer sur le lien suivant<br/>
						<br /><br />
                       <a href='http://localhost/rdv/controlleur/confirmerInscription.php?jeton=" . $user->getJeton() . "&id=" . $user->getId() . "' >Cliquez ICI pour activer :)</a>     
						<br /><br />
						Merci,
____________________________________________________________________<br>
</body>
</html>");
            header('Location: apresInscription');
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
        'role' => '%CLIENT%',
        'etat' => '1'
    ));
    $users = $query->getResult();


    if (!empty($users)) {
        $_SESSION['user'] = $users[0];
        ;
        if (isset($_SESSION['RDV'])) {
            header('Location: prendreRDVStep2');
            return false;
        }
        header('Location: index');
    } else {
        $erreurs[] = "Vérifier votre email et mot de passe!";
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submitforgot'])) {
    $password = mdpAlea(8);

    $user = $em->getRepository('User')->findByEmail($_POST['forgotemail']);
    if (empty($user)) {
        $erreurs[] = "Vérifier votre adresse email!";
    }
    if (empty($erreurs)) {
        $user[0]->setPassword($password);

        $em->flush();
        $mail = new Mail();
        $mail->Send($_POST['forgotemail'], "Rappel mot de passe", "<html>
<body>
réinitialisation du mot de passe :<br><br>
___________________________________________________________________<br>
Nom et Prénom: " . $user[0]->getNom() . ' ' . $user[0]->getPrenom() . "<br>
nouveau mot de passe: $password <br>
Email: " . $user[0]->getEmail() . "<br>
<br>
Date:  $today  <br>
<br>
Nous avons demandé de réinitialiser votre mot de passe, Si vous souhaitez vous connecter à nouveau, cliquez sur le lien suivant, si non juste ignorez cet email,
				   <br /><br />
				   Cliquez sur le lien suivant pour vous connecter à nouveau 
				   <br /><br />
				   <a href=http://localhost/rdv/loginClient>Cliquez ici pour vous connecter à nouveau</a>
				   <br /><br />
				   Merci :)
				   
____________________________________________________________________<br>
</body>
</html>");
    }
}




