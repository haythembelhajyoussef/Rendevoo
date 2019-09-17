<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$domaine = new domaine();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $domaine->chargement($_POST['domaine']);
    $erreurs = $domaine->getErreurs();
    if ($domaine->isValide()) {
        $em->persist($domaine);
        $em->flush();
        header('Location: domaines');
    }
}




