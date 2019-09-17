<?php
require_once __DIR__ . '/../../app/bootstrap.php';
$stat= $em->getConnection()->query("select count(id) as nombre,month(date) as label from rdv group by month(date)");
$datamois =$stat->fetchAll(PDO::FETCH_ASSOC);


$stat= $em->getConnection()->query("(select 'PROFESSIONNEL' as label , (select count(id) from user where role like '%PROFESSIONNEL%') as nombre) union (select 'CLIENT' as label , (select count(id) from user where role like '%CLIENT%') as nombre)");
$datauser =$stat->fetchAll(PDO::FETCH_ASSOC);

$stat= $em->getConnection()->query("select count(r.id) as nombre ,d.nom as label from rdv r join calendrier c join professionnel p join specialite s join domaine d where r.calendrier_id = c.id and p.id = c.professionnel_id and p.specialite_id = s.id and s.domaine_id =d.id group by d.id");
$datadomaine =$stat->fetchAll(PDO::FETCH_ASSOC);




$stat = [
    "rdv_mois" => statForm(mois($datamois)),
    "user"=> statForm($datauser),
    "domaine"=> statForm($datadomaine)
    ];

echo json_encode($stat);

function statForm($datas) {
    $coleur =[];
    $data=[];
    $label=[];
    foreach ($datas as $d) {
        $data[]=$d['nombre'];
        $label[]=$d['label'];
        $coleur[]= coleur();
    }
  
    return ['data' => $data, 'coleur' => $coleur, 'label' => $label];
}

function coleur (){
    $c="#";
   for($i = 0 ;$i<6;$i++){
       $c.=dechex(mt_rand(0, 15));
       
   }
    return $c;
}

function mois($datamois) {
    $m = [
        ['nombre' => 0, 'label' => 'janvier'],
        ['nombre' => 0, 'label' => 'février'],
        ['nombre' => 0, 'label' => 'mars'],
        ['nombre' => 0, 'label' => 'avril'],
        ['nombre' => 0, 'label' => 'mai'],
        ['nombre' => 0, 'label' => 'juin'],
        ['nombre' => 0, 'label' => 'juillet'],
        ['nombre' => 0, 'label' => 'août'],
        ['nombre' => 0, 'label' => 'septembre'],
        ['nombre' => 0, 'label' => 'octobre'],
        ['nombre' => 0, 'label' => 'novembre'],
        ['nombre' => 0, 'label' => 'décembre'],
    ];
    
    foreach ($datamois as $data) {
        $m[$data['label']-1]['nombre']=$data['nombre'];
    }
    return $m;
}