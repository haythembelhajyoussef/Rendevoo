<?php

require_once __DIR__ . '/../app/bootstrap.php';

$rdv = $em->getRepository('rdv')->find($_GET['id']);
$rdv->setEtat('Annulé');
$em->flush();

     header('Location: ../espaceClient'); 