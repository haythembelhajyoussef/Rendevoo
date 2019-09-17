<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$admin = $em->getRepository('User')->find($_GET['id']);
$em->remove($admin);
$em->flush();
header('Location: ../admins');