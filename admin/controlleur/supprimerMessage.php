<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$message = $em->getRepository('Contact')->find($_GET['id']);
$em->remove($message);
$em->flush();
header('Location: ../messages');