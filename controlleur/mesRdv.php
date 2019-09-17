<?php
require_once __DIR__ . '/../app/bootstrap.php';

$iduser = $_SESSION['user']->getId();
$user = $em->getRepository('User')->find($iduser);
$rdvs = $user->getRdvs();