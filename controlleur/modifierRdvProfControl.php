<?php

require_once __DIR__ . '/../app/bootstrap.php';

$rdv = $em->getRepository('Rdv')->find($_GET['idrdv']);

$time_heureFin = strtotime($_GET['heur']) + $rdv->getCalendrier()->getDuree() * 60;
$heure = new DateTime($_GET['heur']);
$heure_fin = new DateTime(date("H:i:s",$time_heureFin));
$date = new DateTime($_GET['date']);

$rdv->setHeure_debut($heure);
$rdv->setHeure_fin($heure_fin);
$rdv->setDate($date);
$rdv->setCalendrier($rdv->getCalendrier());

    $erreurs = $rdv->getErreurs();
    if ($rdv->isValide()) {
        $em->flush();
        header('Location: espaceClient');
    }

