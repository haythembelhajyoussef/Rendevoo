<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$notification = $em->getRepository('Notification')->find($_GET['id']);
$em->remove($notification);
$em->flush();
header('Location: ../notifications');