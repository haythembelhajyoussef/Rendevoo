<?php

require_once __DIR__ . '/../app/bootstrap.php';

$temp = $em->getRepository('TempsTravail')->find($_GET['id']);
$em->remove($temp);
$em->flush();
header('Location: ../espaceProfessionnel');