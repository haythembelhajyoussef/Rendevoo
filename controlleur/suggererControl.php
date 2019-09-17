<?php
require_once __DIR__ . '/../include/Mail.php';
require_once __DIR__ . '/../app/bootstrap.php';
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%ADMIN%'");
$admins = $query->getResult();

$suggestion = new suggestion();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $suggestion->chargement($_POST['suggestion']);
    $erreurs = $suggestion->getErreurs();
    if ($suggestion->isValide()) {

        $em->persist($suggestion);

        foreach ($admins as $admin) {
            $notif = new Notification();
            $notif->setDate(new DateTime);
            $notif->setEtat(false);
            $notif->setMessage("Un nouveau professionnel a été suggéré");
            $notif->setUser($admin);

            $em->persist($notif);
        }

        $em->flush();

        $mail = new Mail();
        $mail->Send($suggestion->getEmail(), "Suggetion", "<html>
<body>
Suggétion :<br>
___________________________________________________________________<br>
Nous vous invitons à notre site web Rendevoo.tn  <a href='http://localhost/rdv/loginProfessionnel'>Cliquez ICI pour s'inscrire :)</a>    
<br>
Pour compléter votre inscription, Veuillez cliquer sur le lien suivant<br/>
						<br /><br />
						Merci,
____________________________________________________________________<br>
</body>
</html>");


        header('Location: espaceClient');
    }
}