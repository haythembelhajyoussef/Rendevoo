<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$specialite = $em->getRepository('Specialite')->find($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $specialite->chargement($_POST['specialite']);

    $erreurs = $specialite->getErreurs();
    if ($specialite->isValide()) {


        $em->flush();
        header('Location: specialites');
    }
}