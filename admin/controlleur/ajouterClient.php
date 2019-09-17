<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$user = new User();

$query = $em->createQuery("SELECT u FROM User u where  u.role like '%ADMIN%'");
$admins = $query->getResult();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user->chargement($_POST['user']);
    $user->setRole(["CLIENT"]);
    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $client = new Client();
        $client->setUser($user);
        $em->persist($client);

        foreach ($admins as $admin) {
            $notif = new Notification();
            $notif->setDate(new DateTime);
            $notif->setEtat(false);
            $notif->setMessage("Un nouveau client a été ajouté");
            $notif->setUser($admin);

            $em->persist($notif);
        }

        $em->flush();
        header('Location: clients');
    }
}