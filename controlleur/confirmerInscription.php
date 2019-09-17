<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../include/alert.php';
$user = $em->getRepository('User')->find($_GET['id']);

if ($_GET['jeton'] == $user->getJeton()) {
    $user->setEtat('1');
    $em->flush();
  header('Location: ../apresConfirmation');
}
