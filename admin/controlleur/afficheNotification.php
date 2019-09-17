<?php

require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$stat = $em->getConnection()->prepare("select * from notification where user_id= :user");
$stat->execute([
    'user' => $_SESSION['user']->getId()
]);
echo json_encode($stat->fetchAll(PDO::FETCH_ASSOC));
