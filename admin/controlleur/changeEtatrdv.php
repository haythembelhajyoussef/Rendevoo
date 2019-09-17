<?php

require_once __DIR__ . '/../../app/bootstrap.php';
require_once __DIR__ . '/../../app/dbConfig.php';
include __DIR__ . '/sessionAdmin.php';

$check_q = "SELECT id FROM rdv WHERE  CURTIME()=heure_fin ";
$check = $db->query($check_q);
while ($row = $check->fetch_assoc()) {
    $id = $row['id'];
    $termine = utf8_decode('Terminé');
    $queryy = "UPDATE rdv SET etat='" . $termine . "' WHERE id='" . $id . "'";
    $insertt = $db->query($queryy);
}
