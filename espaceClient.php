<?php
require_once __DIR__ . '/app/bootstrap.php';
include __DIR__ . '/controlleur/sessionClient.php';
include './controlleur/ProfilClientControl.php';
include './controlleur/mesRdv.php';
include './controlleur/mesProfessionnel.php';
include './controlleur/suggererControl.php';
?>
<html>
    <?php include './include/head.php'; ?>
    <style>
        th {
            background: #006a72;
        }
    </style>
    <?php include './include/alert.php'; ?>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>

    <center><h1 style="padding-top:70px;"><strong>Espace Client</strong></h1></center>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">


                    <div class="panel panel-default">

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#" id="mesRdv" name="mesRdv" style="padding-right:100px;"><i class="glyphicon glyphicon-calendar" aria-hidden="true"><b> Mes Rendez-vous</b></i></a></li>
                                <li><a href="#" id="prof" name="prof" style="padding-right:100px;"><i class="glyphicon glyphicon-briefcase" aria-hidden="true"><b> Mes professionnels</b></i></a></li>
                                <li><a href="#" id="param" name="param" style="padding-right:100px;"><i class="glyphicon glyphicon-user" aria-hidden="true"><b> Mon Profil</b></i></a></li>
                                <li><a href="#" id="suggProf" name="suggProf" style="padding-right:100px;"><i class="glyphicon glyphicon-bullhorn" aria-hidden="true"><b> Suggérer Professionnel</b></i></a></li>

                            </ul>
                        </div>

                        <!-- /.panel-body -->
                    </div>
                </div>
                <!-- /.panel-heading -->
            </div>
            <!-- /.panel -->
        </div>

    </nav>



    <div class="container" style="width:100%;">
        <div  name ="modif"  id="modif" style="display:none; padding-top:100px;"> 

            <div class="panel-heading" style="font-size: 25px">
                Profil
            </div>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#idemail">Adresse E-mail <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="idemail" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  method="post" action="" name="login">
                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Adresse E-mail</label>
                                    <div class="col-sm-4">
                                        <input type="email" class="form-control"  name="user[email]" value="<?php echo $user->getEmail(); ?>" placeholder="Adresse E-mail" required>
                                    </div>
                                </div><br><br> 
                                <div class="form-group">
                                    <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                                    <div class="col-sm-4">

                                        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                                        <input name="fichier" type="file" id="fichier_a_uploader" />
                                        <input type="submit" name="user[avatar]" value="Uploader" />

                                    </div>
                                </div><br><br>
                                <div class="btn-group col-sm-offset-2">
                                    <button type="submit" id="enreglogin" name="enreglogin" class="btn btn-primary">Enregistrer les modifications</button>
                                    <button type="button" id="annulerlogin" name="annulerlogin" class="btn">Annuler</button>
                                </div></form>

                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#idnom">Nom et photo <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="idnom" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form method="post" action="" name="nomprenom">
                                <div class="form-group">
                                    <label for="prenom" class="col-sm-2 control-label">Prénom </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="user[prenom]" placeholder="Prénom" value ="<?php echo $user->getPrenom(); ?>" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="nom" class="col-sm-2 control-label">Nom </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $user->getNom(); ?>" name="user[nom]" placeholder="Nom" required>
                                    </div>
                                </div><br><br>
                                <div class="btn-group col-sm-offset-2">
                                    <button type="submit" id="enregname" name="enregname" class="btn btn-primary">Enregistrer les modifications</button>
                                    <button type="submit" id="annulername" name="annulername" class="btn">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#idpass">Password <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="idpass" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form method="post" action="" name="pass">
                                <div class="form-group">
                                    <label for="currpass" class="col-sm-2 control-label">Actuel </label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="currmdp" name="currmdp" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="newpass" class="col-sm-2 control-label">Nouveau </label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="newmdp" name="newmdp" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="newpass" class="col-sm-2 control-label">Confirmer </label>
                                    <div class="col-sm-4">
                                        <input type="password" class="form-control" id="confirmmdp" name="confirmmdp" required>
                                    </div>
                                </div><br><br>
                                <div class="btn-group col-sm-offset-2">
                                    <button type="submit" id="enregmdp" name="enregmdp" class="btn btn-primary">Enregistrer les modifications</button>
                                    <button type="submit" id="annulermdp" name="enregmdp" class="btn">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#iddonnee">Données personnelles <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="iddonnee" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form method="post" action="" name="Donnee">
                                <div class="form-group">
                                    <label for="ville" class="col-sm-2 control-label">Ville </label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $user->getVille(); ?>" name="user[ville]" placeholder="Ville" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="adresse" class="col-sm-2 control-label">Adresse</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $user->getAdresse(); ?>" name="user[adresse]" placeholder="Adresse" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="codep" class="col-sm-2 control-label">Code Postal</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $user->getCodePostal(); ?>" name="user[codepostal]" placeholder="Code Postal" required>
                                    </div>
                                </div><br><br>
                                <div class="form-group">
                                    <label for="tel" class="col-sm-2 control-label">Téléphone</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo $user->getTel(); ?>" name="user[tel]" placeholder="Téléphone" required>
                                    </div>
                                </div><br><br>
                                <div class="btn-group col-sm-offset-2">
                                    <button type="submit" id="enregdp" name="enregdp" class="btn btn-primary">Enregistrer les modifications</button>
                                    <button type="submit" id="annulerdp" name="enregdp" class="btn">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#idcompte">Gérer le compte <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="idcompte" class="panel-collapse collapse">
                        <div class="panel-body">


                            <div class="btn-group col-sm-offset-2">
                                <button type="submit" id="annulercompte" class="btn">Annuler</button>
                            </div>
                            <div class="btn-group col-sm-offset-2">
                                <button type="submit" id="annulercompte" class="btn">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#idnotif">Notification <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                        </h4>
                    </div>
                    <div id="idnotif" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="tel" class="col-sm-2 control-label">Mailing</label>
                                <div class="col-sm-4">
                                    <input type="checkbox" class="form-control" id="mailing" name="mailing" required>
                                </div>
                            </div><br><br>
                            <div class="btn-group col-sm-offset-2">
                                <button type="submit" id="validmailing" name="validmailing" class="btn btn-primary">Valider</button>
                                <button type="submit" id="annulercompte" class="btn">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

        </div>

        <form name="mesRdvForm" method="POST" action="" id="mesRdvForm" style="padding-top:100px;">

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="font-size: 25px">
                                Mes Rendez-vous
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Heure</th>
                                                <th>Etat</th>
                                                <th>Nom professionnel</th>
                                                <th>spécialité</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rdvs as $rdv): ?>
                                                <tr>
                                                    <td><?php echo $rdv->getDate()->format("j/m/y") ?></td>
                                                    <td><?php echo $rdv->getHeure_debut()->format("H:i") . " à " . $rdv->getHeure_fin()->format("H:i") ?></td>
                                                    <td>
                                                        <?php if ($rdv->getEtat() == 'En cours'): ?>

                                                            <span style="color : orange;">En cours <i class="fa fa-spinner fa-pulse" aria-hidden="true"></i><span class="sr-only">Loading...</span></span>

                                                        <?php elseif ($rdv->getEtat() == 'Termine'): ?>

                                                            <span style="color : green;">Terminé <i class="fa fa-check" aria-hidden="true"></i></span>

                                                        <?php else : ?>

                                                            <span style="color : red;">Annuler <i class="fa fa-times" aria-hidden="true"></i></span>                                                      

                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php echo $rdv->getCalendrier()->getProfessionnel()->getUser()->getNom() . " " . $rdv->getCalendrier()->getProfessionnel()->getUser()->getPrenom() ?></td>
                                                    <td><?php echo $rdv->getCalendrier()->getProfessionnel()->getSpecialite()->getNom() ?></td>
                                                    <td>
                                                        <?php if ($rdv->getEtat() == 'En cours') { ?>
                                                            <!-- Button trigger modal -->
                                                            <a style="color : blue" href="#" class="btnedit" datardv="<?php echo $rdv->getId(); ?>" dataid='<?php echo $rdv->getCalendrier()->getProfessionnel()->getId(); ?>'> <i data-toggle="tooltip" title="Changer le date ou l'heure de votre rendez-vous" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                            <!-- Modal -->

                                                            <a onclick="return confirm('Vous êtes sur d annuler ce rendez-vous ?')" title="Annuler mon rendez-vous" href="controlleur/annulerRDVProf.php?id=<?php echo $rdv->getId() ?>"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </form>
        <div class="modal fade" id="editrdv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span style="font-size: 20px" class="modal-title" id="myModalLabel">Calendrier de <b><?php echo $rdv->getCalendrier()->getProfessionnel()->getUser()->getNom() . " " . $rdv->getCalendrier()->getProfessionnel()->getUser()->getPrenom() ?></b></span>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Retour</button>

                    </div>
                </div>
            </div>
        </div>
        <!--    suggestion professionnel   -->
        <form data-toggle="validator" class="form-inline" name="suggForm" id="suggForm" action="" method="POST" role="form" style="display: none; padding-top:100px;">
            <?php $domaines = $em->getRepository('Domaine')->findAll(); ?>

            <center><h1><strong>Votre Professionnel n'est pas sur Rendevoo ? </strong></h1></center>
            <center><b>Faites lui découvrir la prise de rendez-vous en ligne.<br>
                    Nous contacterons votre professionnel de votre part !</b></center><br>
            <center> Vous<br>
                <div class="col-lg-10 col-lg-offset-1">  			

                    <div class="form-group">
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user->getNom(); ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user->getPrenom(); ?>" disabled>  
                    </div>
                    <div class="form-group input-group">
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->getEmail(); ?>" disabled>

                    </div> 
                </div></center><br><br>

            <center>Votre Professionnel<br><br>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="suggestion[nomprof]" placeholder="Nom de votre Professionnel" required>
                    <div class="help-block with-errors"></div>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>

                <div class="form-group has-feedback">
                    <input type="number" name="suggestion[tel]" class="form-control" placeholder="Téléphone de votre Professionnel"  required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-xs-12">                                                                                            
                        <select class="form-control select"  name="suggestion[domaine]">
                            <?php foreach ($domaines as $domaine) : ?>
                                <option value="<?php echo $domaine->getId() ?> "> <?php echo $domaine->getNom() ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <input type="email" name="suggestion[email]" placeholder="Email de votre Professionnel" class="form-control" data-error="Adresse e-mail invalide!" required>       
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div> <br><br>
                <button type="submit" class="form-control btn btn-register" name="recommander" id="recommander">Recommander votre professionnel</button></center>
        </form>

        <form name="mesprofForm" method="POST" action="" id="mesprofForm" style="display: none; padding-top:100px;">


            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="font-size: 25px">
                                Mes professionnels
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Domaine / Spécialité</th>
                                                <th>Téléphone</th>
                                                <th>Adresse</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $pro = [];
                                            foreach ($rdvsg as $rdv):
                                                $professionnel = $rdv->getCalendrier()->getProfessionnel();
                                                ?>
                                                <tr>
                                                    <td><?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom() ?> </td>
                                                    <td><?php echo $professionnel->getSpecialite()->getDomaine()->getNom() . ' / ' . $professionnel->getSpecialite()->getNom() ?></td>
                                                    <td><?php echo $professionnel->getUser()->getTel() ?></td>
                                                    <td><?php echo $professionnel->getUser()->getAdresse() ?></td>
                                                    <td><a onclick="return confirm('Vous êtes sur de réclamer ce professionnel ?')" title="Réclamer ce professionnel" href="controlleur/reclamationControl.php?id=<?php echo $professionnel->getUser()->getId() ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>


                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </form>
    </div>
    <!-- jQuery -->

    <script>
        $(function () {
            $('.btnedit').click(function () {

                var btn = $(this);

                var modal = $('#editrdv');
                $.ajax({
                    url: 'modifRDV',
                    method: 'GET',
                    jsonType: 'json',
                    data: {idProf: btn.attr('dataid'), idrdv: btn.attr('datardv'), },
                    success: function (rep) {
                        modal.find('.modal-body').html(rep);
                        modal.modal('show');
                    }
                })
            });
        });
        //script de form ajax
        $("#suggProf").click(function () {
            $("#modif").hide();
            $("#mesRdvForm").hide();
            $("#mesprofForm").hide();
            $("#suggForm").slideDown(500);
        });
        $("#param").click(function () {
            $("#suggForm").hide();
            $("#mesRdvForm").hide();
            $("#mesprofForm").hide();
            $("#modif").slideDown(500);
        });
        $("#mesRdv").click(function () {
            $("#suggForm").hide();
            $("#modif").hide();
            $("#mesprofForm").hide();
            $("#mesRdvForm").slideDown(500);
        });
        $("#prof").click(function () {
            $("#mesRdvForm").hide();
            $("#modif").hide();
            $("#suggForm").hide();
            $("#mesprofForm").slideDown(500);
        });
    </script>




    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/js/metisMenu.js"></script>

    <!-- DataTables JavaScript -->
    <script src="assets/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables.bootstrap.js"></script>
    <script src="assets/js/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/Tadmin.js"></script>

    <script type="text/javascript" src="admin/js/jquery.dynatable.js"></script>
    <link href="admin/css/jquery.dynatable.css" rel="stylesheet">   
    <script type="text/javascript">
        $('table').dynatable();
    </script>
</body>
</html>