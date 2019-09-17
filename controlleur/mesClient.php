<?php

require_once __DIR__ . '/../app/bootstrap.php';

$iduser = $_SESSION['user']->getId();
$user = $em->getRepository('User')->find($iduser);
$rdvsg = $em->createQueryBuilder()->select('r')
                ->from('Rdv', 'r')
                ->where('r.calendrier= ' . $user->getProfessionnel()->getCalendrier()->getId())
                ->groupBy('r.user')
                ->getQuery()->getResult();
