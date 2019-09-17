<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$professionnel = $em->getRepository('User')->find($_GET['id']);
$em->remove($professionnel);
$em->flush();
header('Location: ../professionnels');