<?php

//session_start();
require_once __DIR__ . '/../app/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $rdv = new rdv();
    $professionnel = $em->getRepository('Professionnel')->find($_SESSION['RDV']['prof']);
    $time_heureFin = strtotime($_SESSION['RDV']['heur']) + $professionnel->getCalendrier()->getDuree() * 60;
    $heure = new DateTime($_SESSION['RDV']['heur']);
    $heure_fin = new DateTime(date("H:i:s", $time_heureFin));

    $date = new DateTime($_SESSION['RDV']['date']);




    $rdv->setHeure_debut($heure);
    $rdv->setHeure_fin($heure_fin);
    $rdv->setDate($date);
    $rdv->setCalendrier($professionnel->getCalendrier());
    $rdv->setEtat('En cours');


    $em->persist($rdv);
    $em->flush();

    unset($_SESSION['RDV']);
}