<?php

require_once __DIR__ . '/../app/bootstrap.php';

$contact = new contact();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $contact->chargement($_POST['contact']);
    $erreurs = $contact->getErreurs();
    if ($contact->isValide()) {
        $contact->setEtat(false);
        $em->persist($contact);
        $em->flush();
        header('Location: index.php');
    }
}