<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$user = new User();
$professionnel = new Professionnel();

$domaines = $em->getRepository('Domaine')->findAll();
$specialites = $em->getRepository('Specialite')->findAll();
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $user->chargement($_POST['user']);
    $professionnel->chargement($_POST['professionnel']);
    $professionnel->setSpecialite($em->getRepository('Specialite')->find($_POST['specialite']));
    $user->setRole(["PROFESSIONNEL"]);
    $erreurs = $user->getErreurs();
    if ($user->isValide() && $professionnel->isValide()) {


        $professionnel->setUser($user);
        $em->persist($professionnel);
        $em->flush();
        header('Location: professionnels');
    }
}