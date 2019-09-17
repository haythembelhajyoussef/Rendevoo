<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$specialite = new specialite();

$domaines = $em->getRepository('Domaine')->findAll();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $specialite->chargement($_POST['specialite']);
    $specialite->setDomaine( $em->getRepository('Domaine')->find($_POST['domaine']));
    $erreurs = $specialite->getErreurs();
    if ($specialite->isValide()) {
        $em->persist($specialite);
        $em->flush();
        header('Location: specialites');
    }
}