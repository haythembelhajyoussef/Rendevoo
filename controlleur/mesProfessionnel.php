<?php

require_once __DIR__ . '/../app/bootstrap.php';

$iduser = $_SESSION['user']->getId();
$user = $em->getRepository('User')->find($iduser);
$rdvsg = $em->createQueryBuilder()->select('r')
                ->from('Rdv', 'r')
                ->where('r.user= ' . $iduser)
                ->groupBy('r.calendrier')
                ->getQuery()->getResult();
