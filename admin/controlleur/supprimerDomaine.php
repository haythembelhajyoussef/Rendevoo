<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$domaine = $em->getRepository('Domaine')->find($_GET['id']);
$em->remove($domaine);
$em->flush();
header('Location: ../domaines');