<?php
require_once __DIR__ . '/app/bootstrap.php';
include __DIR__ . '/controlleur/sessionProfessionnel.php';
include_once 'controlleur/paramCalendrierControl.php';
include_once './controlleur/ProfilProfessionnelControl.php';
include_once './controlleur/mesRdvProf.php';
include_once './controlleur/mesClient.php';
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

        <div id="main-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">


                            <div class="panel panel-default">

                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li><a href="#profile" data-toggle="tab"><i class="fa fa-user"></i> Mon profil</a>
                                        </li>
                                        <li><a href="#mesRdv" data-toggle="tab"><i class="fa fa-calendar"></i> Mes rendez vous</a>
                                        </li>
                                        <li><a href="#mesClients" data-toggle="tab"><i class="fa fa-users"></i> Mes clients</a>
                                        </li>
                                        <li><a href="#parametrerCalendrier" data-toggle="tab"><i class="fa fa-clock-o"></i> Paramétrer calendrier</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!--Modifier profile-->

                                    <div class="tab-pane fade" id="profile" >
                                        <h4>Profile</h4>
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#idemail">Adresse E-mail <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                                                    </h4>
                                                </div>
                                                <div id="idemail" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form method="post" action="" name="login">
                                                            <div class="form-group">
                                                                <label for="email" class="col-sm-2 control-label">Adresse E-mail</label>
                                                                <div class="col-sm-4">
                                                                    <input type="email" class="form-control"  name="user[email]" value="<?php echo $user->getEmail(); ?>" placeholder="Adresse E-mail" required>
                                                                </div>
                                                            </div><br><br> 
                                                            <div class="form-group">
                                                                <label for="avatar" class="col-sm-2 control-label">Avatar</label>
                                                                <div class="col-sm-4">
                                                                    <input type="file" class="form-control" id="cPostal" name="avatar">
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
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#idnom">Nom d'utilisateur <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
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
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#idDprof">Données Professionnel <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
                                                    </h4>
                                                </div>
                                                <div id="idnom" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <form method="post" action="" name="nomprenom">
                                                            <div class="form-group">
                                                                <label for="description" class="col-sm-2 control-label">Description </label>
                                                                <div class="col-sm-4">
                                                                    <textarea class="form-control" value="<?php echo $user->getProfessionnel()->getDescription(); ?>" name="professionnel[nom]" placeholder="Description"></textarea>
                                                                </div>
                                                            </div><br><br>
                                                            <div class="btn-group col-sm-offset-2">
                                                                <button type="submit" id="enregdescription" name="enregdescription" class="btn btn-primary">Enregistrer les modifications</button>
                                                                <button type="submit" id="annulerdescription" name="annulerdescription" class="btn">Annuler</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#idcompte">Compte <i class="fa fa-chevron-right" style="float:right;" aria-hidden="true"></i></a>
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
                                        </div>
                                    </div>
                                    <!-- /.row -->    

                                    <!--Mes rendez-vous-->
                                    <div class="tab-pane fade" id="mesRdv">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <b>Mes rendez-vous</b>
                                                </div>
                                                <!-- /.panel-heading -->
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nom client</th>
                                                                    <th>Date rendez-vous</th>
                                                                    <th>Heure rendez-vous</th>
                                                                    <th>Etat</th>
                                                                    <th></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($rdvs as $rdv): ?>
                                                                    <tr>
                                                                        <td><?php echo $rdv->getUser()->getNom() . ' ' . $rdv->getUser()->getPrenom() ?></td>
                                                                        <td><?php echo $rdv->getDate()->format("j/m/y") ?></td>
                                                                        <td><?php echo $rdv->getHeure_debut()->format("H:i:s") . ' à ' . $rdv->getHeure_fin()->format("H:i:s") ?></td>
                                                                        <td>
                                                                            <?php if ($rdv->getEtat() == 'En cours'): ?>

                                                                                <span style="color : orange;">En cours <i class="fa fa-spinner fa-pulse" aria-hidden="true"></i><span class="sr-only">Loading...</span></span>

                                                                            <?php elseif ($rdv->getEtat() == 'Termine'): ?>

                                                                                <span style="color : green;">Terminé <i class="fa fa-check" aria-hidden="true"></i></span>

                                                                            <?php else : ?>

                                                                                <span style="color : red;">Annuler <i class="fa fa-times" aria-hidden="true"></i></span>                                                      

                                                                            <?php endif; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($rdv->getEtat() == 'En cours') { ?>
                                                                                <!-- Button trigger modal -->
                                                                                <a style="color : blue" href="#" class="btnedit" datardv="<?php echo $rdv->getId(); ?>" dataid='<?php echo $rdv->getCalendrier()->getProfessionnel()->getId(); ?>'> <i data-toggle="tooltip" title="Changer le date ou l'heure de votre rendez-vous" class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                                                <!-- Modal -->

                                                                                <a onclick="return confirm('Vous êtes sur d annuler ce rendez-vous ?')" title="Annulé mon rendez-vous" href="controlleur/annulerRDV.php?id=<?php echo $rdv->getId() ?>"><i style="color: red;" class="fa fa-times" aria-hidden="true"></i></a>
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
                                        <!-- /.col-lg-6 -->
                                    </div>

                                    <!--Mes clients-->
                                    <div class="tab-pane fade" id="mesClients">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <b>Mes Clients</b>
                                                    </div>
                                                    <!-- /.panel-heading -->
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>                                                                     
                                                                        <th>Adresse E-mail</th>
                                                                        <th>Nom et Prénom</th>
                                                                        <th>Numéro de téléphone</th>
                                                                        <th>Adresse</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $pro = [];
                                                                    foreach ($rdvsg as $rdv):
                                                                        $client = $rdv->getUser();
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $client->getEmail() ?> </td>
                                                                            <td><?php echo $client->getNom() . ' ' . $client->getPrenom() ?> </td>
                                                                            <td><?php echo $client->getTel() ?></td>
                                                                            <td><?php echo $client->getAdresse() ?></td>
                                                                            <td><a onclick="return confirm('Vous êtes sur de réclamer ce client ?')" title="Réclamer ce professionnel" href="controlleur/reclamationControl.php?id=<?php echo $client->getId() ?>"><i class="fa fa-info-circle" aria-hidden="true"></i></a></td>
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



                                    <!--paramétrer calendrier-->
                                    <div class="tab-pane fade" id="parametrerCalendrier">
                                        <h4>Paramétrer calendrier</h4>
                                        <div class="panel-body">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li><a href="#disponibilite" data-toggle="tab">Disponibilité</a>
                                                </li>                                              
                                                <li><a href="#conge" data-toggle="tab">jours de congé</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">

                                                <!--Disponibilité-->
                                                <?php require_once 'espaceProfessionnelDisponibilite.php'; ?>

                                                <!--Jours de Congé-->
                                                <div class="tab-pane fade" id="conge">
                                                    <h4>Ajouter un congé</h4>
                                                    <div class="container">
                                                        <div class='col-md-5'>
                                                            <div class="form-group">
                                                                <div class='input-group date' id='datetimepicker6'>

                                                                    <input type='text' class="form-control" id="a" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-5'>
                                                            <div class="form-group">
                                                                <div class='input-group date' id='datetimepicker7'>
                                                                    <input type='text' class="form-control" id="b" />
                                                                    <span class="input-group-addon">
                                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-success">Ajouter</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-body -->    
                            </div>

                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
            <!-- /.panel-heading -->
        </div>
        <!-- /.panel -->
    </div>

    <div id="footer-container"></div>
    <script src='assets/js/moment.min.js'></script>
    <script src="assets/js/bootstrap-datetimepicker.js"></script>
    <script type="text/javascript" src="admin/js/jquery.dynatable.js"></script>
    <link href="admin/css/jquery.dynatable.css" rel="stylesheet">   
    <script type="text/javascript">
                                                                                                                                    $('table').dynatable();
    </script>
    <script>
        $(function () {
            $('.btnedit').click(function () {

                var btn = $(this);

                var modal = $('#editrdv');
                $.ajax({
                    url: 'modifRDVProf',
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

        $(function () {
            $('#datetimepicker6').datetimepicker();
            $('#datetimepicker7').datetimepicker({
                useCurrent: false //Important! See issue #1075
            });
            $("#datetimepicker6").on("dp.change", function (e) {
                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
            });
            $("#datetimepicker7").on("dp.change", function (e) {
                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
</body>
</html>
