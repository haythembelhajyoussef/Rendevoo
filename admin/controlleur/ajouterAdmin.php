<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$user = new User();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user->chargement($_POST['user']);
    $user->setRole(["ADMIN"]);
    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->persist($user);
        $em->flush();
        header('Location: admins');
    }
}