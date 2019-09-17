<?php
require_once __DIR__ . '/../../app/bootstrap.php';
include __DIR__ . '/sessionAdmin.php';
$stat= $em->getConnection()->prepare("select * from contact");
$stat->execute();
echo json_encode($stat->fetchAll(PDO::FETCH_ASSOC));