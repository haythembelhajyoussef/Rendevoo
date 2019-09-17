<?php

require_once __DIR__ . '/../app/bootstrap.php';

$temp = $em->getRepository('TempsTravail')->find($_GET['id']);


    $temp->chargement($_POST['temp']);
    $erreurs = $temp->getErreurs();
    if ($temp->isValide()) {
        $em->flush();
        header('Location: yes');
    }
