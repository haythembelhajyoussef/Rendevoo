<?php

require_once __DIR__ . '/../app/bootstrap.php';

$tempsTravail = new TempsTravail();
$iduser = $_SESSION['user']->getId();

$user = $em->getRepository('User')->find($iduser);
$calendrier = $user->getProfessionnel()->getCalendrier();



if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ajout'])) {

    $jour = $_POST['jour'];
    $heureDebut = new DateTime($_POST['heureDebut']);
    $heureFin = new DateTime($_POST['heureFin']);

    $req = $em->getConnection()->prepare("select * from tempstravail t join calendrier c where "
            . "t.calendrier_id = c.id and c.professionnel_id= :idprof And jour LIKE :jour AND (:heureDebut BETWEEN t.heureDebut AND t.heureFin Or :heureFin BETWEEN t.heureDebut AND t.heureFin)");
    $req->execute([
        'idprof' => $user->getProfessionnel()->getId(),
        'jour' => $jour,
        'heureDebut' => $heureDebut->format('H:i:s'),
        'heureFin' => $heureFin->format('H:i:s')
    ]);

    if ($req->fetchAll()) {
        $erreurs[] = "Temps invalide!";
    }

    if ($heureFin < $heureDebut) {
        $erreurs[] = "Interval invalide!";
    }
    if (empty($erreurs)) {
        $tempsTravail->setJour($jour);
        $tempsTravail->setHeureDebut($heureDebut);
        $tempsTravail->setHeureFin($heureFin);
        $tempsTravail->setCalendrier($calendrier);
        $em->persist($tempsTravail);
        $em->flush();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['modif'])) {

    $jour = $_POST['jour'];
    $heureDebut = $_POST['heureDebut'];
    $heureFin = $_POST['heureFin'];

    $tempsTravail->setJour($jour);
    $tempsTravail->setCalendrier($calendrier);

    $tempsTravail->setHeureDebut(new DateTime($heureDebut));
    $tempsTravail->setHeureFin(new DateTime($heureFin));

    $em->persist($tempsTravail);
    $em->flush();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['durebtn'])) {
    $duree = $_POST['duree'];
    $calendrier->setDuree($duree);
    $em->flush();
}