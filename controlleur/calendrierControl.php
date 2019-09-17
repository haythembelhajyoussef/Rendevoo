<?php

$duree = $_GET['duree'];
$s = $_GET['s'];
$prof = $_GET['prof'];
$mweek = strtotime("monday this week") + 604800 * $s;
$format = "Y-m-d";

require_once __DIR__ . '/../app/bootstrap.php';
if ($s >= 0) {


    $req = $em->getConnection()->prepare("select DATE_FORMAT(t.heureDebut,'%H:%i') as heure_debut,DATE_FORMAT(t.heureFin,'%H:%i') as heure_fin,t.jour from tempstravail t join calendrier c where t.calendrier_id = c.id and c.professionnel_id= :idprof");
    $req->execute([
        'idprof' => $prof
    ]);
    $tempEmplois = $req->fetchAll(PDO::FETCH_ASSOC);
} else {
    $tempEmplois = [];
}



$req = $em->getConnection()->prepare("SELECT DATE_FORMAT(r.heure_debut,'%H:%i') as heure_debut ,DATE_FORMAT(r.heure_fin,'%H:%i') as heure_fin,r.date FROM rdv r join calendrier c WHERE c.id=r.calendrier_id and c.professionnel_id= :idprof and r.date >= :date_debut and r.date <= :date_fin");
$req->execute([
    'idprof' => $prof,
    'date_debut' => date($format, $mweek),
    'date_fin' => date($format, $mweek + 518400),
]);
$rdvs = $req->fetchAll(PDO::FETCH_ASSOC);





$jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
$jourtransfr = ['Mon' => "Lundi", 'Tue' => "Mardi", 'Wed' => "Mercredi", 'Thu' => "Jeudi", 'Fri' => "Vendredi", 'Sat' => "Samedi", 'Sun' => "Dimanche"];



$calendrier = [];
if ($s == 0) {
    $d = new DateTime;
    $i = $d->format('N')-1;
} else {
    $i= 0;
}
//initialisation jours et dates
for ($i=0; $i < 7; $i++) {
    $date = date($format, $mweek + 86400 * $i);
    $calendrier[$jours[$i]] = ['date' => $date, 'evenement' => []];
}
//charger temps de travail
for ($i = 0; $i < count($tempEmplois); $i++) {
    $debut_temps = strtotime($tempEmplois[$i]['heure_debut']);
    $fin_temps = strtotime($tempEmplois[$i]['heure_fin']);
    for ($j = $debut_temps; $j < $fin_temps; $j = $j + ($duree * 60)) {
        $calendrier[$tempEmplois[$i]['jour']]['evenement'][timeTostr($j)] = false;
    }
}

//charger rendez vous
for ($i = 0; $i < count($rdvs); $i++) {
    $jour = $jourtransfr[date('D', strtotime($rdvs[$i]['date']))];
    $calendrier["$jour"]["evenement"][$rdvs[$i]['heure_debut']] = true;
}

function timeTostr($time) {
    return date("H:i", $time);
}

echo json_encode($calendrier);

