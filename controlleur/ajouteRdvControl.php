<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../include/alert.php';
$rdv['prof'] = $_GET['prof'];
$rdv['heur'] = $_GET['heur'];
$rdv['date'] = $_GET['date'];


$_SESSION['RDV'] = $rdv;
if (!isset($_SESSION['user'])) {
    $erreurs[] = "Vous devez vous connecter!";
    header('Location: ../loginClient');
}
if (empty($erreurs)) {

    header('Location: ../prendreRDVStep2');
}




