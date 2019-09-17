<?php
require_once __DIR__ . '/../app/bootstrap.php';
include __DIR__ . '/controlleur/sessionAdmin.php';
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%CLIENT%'");
$clients = $query->getResult();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once 'include/head.php'; ?>
    <style>

    </style>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <?php include_once 'include/sidebar.php'; ?>
            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <?php include_once 'include/navigation.php'; ?>


                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">


                            <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Statistaique</h3>

                                </div>
                              
                                <div class="panel-body">    
                                    <div class="row">
                                        <div class="col-md-6">

                                            <!-- START USERS ACTIVITY BLOCK -->
                                            <div class="panel panel-default">
                                                <div class="panel-heading ui-draggable-handle">
                                                    <div class="panel-title-box">
                                                        <h3>Rendez-vous Par mois</h3>
                                                    </div>                                    
                                                                                    
                                                </div>                                
                                                <div class="panel-body padding-0">
                                                    <canvas id="rdvmois" width="400" height="250"></canvas>
                                                </div>                                    
                                            </div>
                                            <!-- END USERS ACTIVITY BLOCK -->

                                        </div>
                                        <div class="col-md-6">
                                              <div class="panel panel-default">
                                                <div class="panel-heading ui-draggable-handle">
                                                    <div class="panel-title-box">
                                                        <h3>Users</h3>
                                                    </div>                                    
                                                                                    
                                                </div>                                
                                                <div class="panel-body padding-0">
                                                     <canvas id="user" width="400" height="250"></canvas>
                                                </div>                                    
                                            </div>
                                           

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                             <div class="panel panel-default">
                                                <div class="panel-heading ui-draggable-handle">
                                                    <div class="panel-title-box">
                                                        <h3>Rendez-vous Par Domaine</h3>
                                                    </div>                                    
                                                                                    
                                                </div>                                
                                                <div class="panel-body padding-0">
                                                     <canvas id="domaine" width="400" height="250"></canvas>
                                                </div>                                    
                                            </div>
                                            

                                        </div>
                                    </div>

                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <?php include_once 'include/logout.php'; ?>

        <?php include_once 'include/preloads.php'; ?>
        <script type="text/javascript" src="js/chart.js"></script>
        <script>
            $(function () {
                function stat(ele, d, option, type) {
                    var data = {
                        labels: d.label,
                        datasets: [
                            {
                                label: "",
                                backgroundColor: d.coleur,
                                borderWidth: 1,
                                data: d.data,
                            }
                        ]
                    };

                    var chart = new Chart(ele, {
                        type: type,
                        data: data,
                        options: option
                    });
                }
                var optionsbar = {
                    scales: {
                        xAxes: [{
                                stacked: true
                            }],
                        yAxes: [{
                                stacked: true
                            }]
                    }
                };
                var optionspie = {
                    animation: {
                        animateScale: true
                    }
                };

                $.ajax({
                    url: 'http://localhost/rdv/admin/controlleur/statistique.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function (rep) {
                        stat($("#rdvmois"), rep.rdv_mois, optionsbar, 'bar');
                        stat($("#user"), rep.user, optionspie, 'pie');
                        stat($("#domaine"), rep.domaine, optionspie, 'pie');
                    }
                });

            });
        </script>

    </body>
</html>






