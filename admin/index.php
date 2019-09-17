<?php
require_once __DIR__ . '/../app/bootstrap.php';
include __DIR__ . '/controlleur/sessionAdmin.php';
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%CLIENT%'");
$clients = $query->getResult();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include_once 'include/head.php'; ?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <?php include_once 'include/sidebar.php'; ?>
            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <?php include_once 'include/navigation.php'; ?>

                <?php include_once 'include/alert.php'; ?>
                <!-- END PAGE TITLE -->             

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <!-- START WIDGETS -->                    
                    <div class="row">
                        <div class="col-md-3">

                            <!-- START WIDGET SLIDER -->
                            <div class="widget widget-default widget-carousel">
                                <div class="owl-carousel" id="owl-example">
                                    <div>                                    
                                        <div class="widget-title">Total Visitors</div>                                                                        
                                        <div class="widget-subtitle">27/08/2014 15:23</div>
                                        <div class="widget-int">3,548</div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">Returned</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int">1,695</div>
                                    </div>
                                    <div>                                    
                                        <div class="widget-title">New</div>
                                        <div class="widget-subtitle">Visitors</div>
                                        <div class="widget-int">1,977</div>
                                    </div>
                                </div>                            
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                             
                            </div>         
                            <!-- END WIDGET SLIDER -->

                        </div>
                        <div class="col-md-3">

                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href = 'pages-messages.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count">48</div>
                                    <div class="widget-title">New messages</div>
                                    <div class="widget-subtitle">In your mailbox</div>
                                </div>      
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>
                            </div>                            
                            <!-- END WIDGET MESSAGES -->

                        </div>
                        <div class="col-md-3">

                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon" onclick="location.href = 'pages-address-book.html';">
                                <div class="widget-item-left">
                                    <span class="fa fa-user"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count">375</div>
                                    <div class="widget-title">Registred users</div>
                                    <div class="widget-subtitle">On your website</div>
                                </div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                            </div>                            
                            <!-- END WIDGET REGISTRED -->

                        </div>
                        <div class="col-md-3">

                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-info widget-padding-sm">
                                <div class="widget-big-int plugin-clock">00:00</div>                            
                                <div class="widget-subtitle plugin-date">Loading...</div>
                                <div class="widget-controls">                                
                                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div>                        
                            <!-- END WIDGET CLOCK -->

                        </div>
                    </div>
                    <!-- END WIDGETS -->                    

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

                    
                    <!-- START DASHBOARD CHART -->
                    <div class="chart-holder" id="dashboard-area-1" style="height: 200px;"></div>
                    <div class="block-full-width">

                    </div>                    
                    <!-- END DASHBOARD CHART -->

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