<?php

require_once __DIR__ . '/../app/bootstrap.php';
$professionnels = [];

$nom = isset($_GET['nom']) ? $_GET['nom'] : null;
$spec = isset($_GET['specialite']) ? $_GET['specialite'] : null;
$ville = isset($_GET['ville']) ? $_GET['ville'] : null;
if ($nom || $ville || $spec) {

    $qb = $em->createQueryBuilder();



    $req = $qb->select('p')
            ->from('Professionnel', 'p')
            ->join('p.user', 'u');


    if ($nom) {
        $req->Where("concat(u.nom,' ', u.prenom) like :nom or concat(u.prenom,' ', u.nom) like :nom");
        $req->setParameter('nom', "%" . $nom . "%");
    }


    if ($ville) {
        $req->andWhere("u.ville= :ville");
        $req->setParameter('ville', $ville);
    }


    if ($spec) {
        $req->andWhere("p.specialite= :specialite");
        $req->setParameter('specialite', $spec);
    }


    $professionnels = $req->getQuery()
            ->getResult();
}