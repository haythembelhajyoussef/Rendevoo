<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';

$user = $em->getRepository('User')->find($_GET['id']);
$user->setEtat(!$user->getEtat());
$em->flush();
if(in_array("ADMIN", $user->getRole()))
{
    header('Location: ../admins');
}
else if(in_array("CLIENT", $user->getRole())){
    header('Location: ../clients');
}
else {
     header('Location: ../professionnels');
} 