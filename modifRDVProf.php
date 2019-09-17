<?php
require_once __DIR__ . '/app/bootstrap.php';
$professionnel = $em->getRepository('Professionnel')->find($_GET['idProf']);
?>

<script src="assets/js/jquery.js"></script>
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/calendrier.css" rel=stylesheet>
<div class="row">
    <div class=" col-md-10 col-md-offset-1">
        <calendrier action="controlleur/modifierRdvProfControl.php?idrdv=<?php echo $_GET['idrdv'] ?>&" dataid="<?php echo $professionnel->getId() ?>" datas="0" dataduree="<?php echo $professionnel->getCalendrier()->getDuree() ?>"></calendrier>

    </div>
</div>
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.js"></script> 

<!--calendrier-->
<script src="assets/js/calendrier.js"></script>