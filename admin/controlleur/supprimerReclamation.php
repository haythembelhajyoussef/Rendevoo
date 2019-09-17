<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$reclamation = $em->getRepository('Reclamation')->find($_GET['id']);
$em->remove($reclamation);
$em->flush();
header('Location: ../reclamations');