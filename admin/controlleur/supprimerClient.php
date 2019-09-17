<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$client = $em->getRepository('User')->find($_GET['id']);
$em->remove($client);
$em->flush();
header('Location: ../clients');