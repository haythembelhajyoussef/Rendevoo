<?php
require_once __DIR__ . '/app/bootstrap.php';
include './controlleur/steps3.php';
$professionnel = $em->getRepository('Professionnel')->find($_GET['idProf']);
?>
<html>
    <?php include './include/head.php'; ?>
    <link rel="stylesheet" type="text/css" id="theme" href="admin/css/theme-default.css"/>
    <?php include './include/alert.php'; ?>
    <link href="assets/css/calendrier.css" rel=stylesheet>
    <body style="padding-top: 50px"> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>

        <div id="main-container">
            <div class="row">
                <div class="resrech">
                    <div class="col-md-1 photo" id ="avatar" style="padding-left:40px;"><img class="thumbnail" src="<?php echo $professionnel->getUser()->getAvatar() ?>" alt="" title="Avatar" width="130" height="230"></div><br>

                    <div class="col-md-5">
                        <span style="font-size: 30px;padding-left:80px;color:#428BCA"><b>
                                <?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom(); ?> </b></span>
                        <br>
                        <span style="font-size: 18px;padding-left:90px;color:#5bc0de"><i class="fa fa-stethoscope"></i><?php echo $professionnel->getSpecialite()->getNom(); ?></span>
                    </div>
                    <div class="col-md-6" style="padding-left: 300px;padding-top: 50px">
                        <a style="width: 250px" href="#cald" name="rdvbtn" id="rdvbtn" class="form-control btn btn-register"><b><i class="fa fa-thumbs-up"></i> Je prends rendez-vous</b></a><br>

                        <br><br> <span style="font-size: 30px;color:black"><b>
                                Dr <?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom(); ?> </b></span><br>
                        <span><?php echo $professionnel->getUser()->getAdresse() ?>
                            <br><?php echo $professionnel->getUser()->getCodePostal() . ' ' . $professionnel->getUser()->getVille() ?><br><br>
                            <i class="fa fa-phone"></i>&nbsp; <?php echo $professionnel->getUser()->getTel() ?><br>
                            <i class="fa fa-envelope"></i>&nbsp;<?php echo $professionnel->getUser()->getEmail() ?>
                        </span> 
                        <div class="opening">
                            <br><strong>Lundi : </strong>08h00 à 13h00 - 15h00 à 17h00<br>
                            <strong>Mardi : </strong>08h00 à 13h00<br>
                            <strong>Mercredi : </strong>14h00 à 18h00<br>
                            <strong>Jeudi : </strong>08h00 à 12h00 - 14h00 à 17h00<br>
                            <strong>Vendredi : </strong>08h00 à 10h00 - 15h00 à 17h00<br>
                            <strong>Samedi : </strong>08h00 à 11h00
                        </div>
                        <!--Google map-->
                        <div class="row">
                            <div class="col-md-6" style="width: 400px;height: 100px;">                        
                                <!-- START GOOGLE MAP WITH MARKER -->
                                <div class="panel panel-default">
                                    <div class="panel-body panel-body-map">
                                        <div id="gmap" style="width: 100%; min-height: 600px"></div>
                                    </div>
                                    <div class="panel-body">
                                        <h3><span class="fa fa-map-marker"></span> <?php echo $professionnel->getUser()->getAdresse() . ', ' . $professionnel->getUser()->getVille() ?></h3>
                                    </div>
                                </div>
                                <!-- END GOOGLE MAP WITH MARKER -->
                            </div>                                               
                        </div>
                    </div>
                </div>

            </div>
            <div style="padding-bottom: 600px;padding-right: 400px">
                <div class="container" id="cald">
                    <span style="font-size: 20px;padding-left: 240px"><b>Prendre rendez-vous avec <?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom(); ?></b></span>

                </div>
                <div class="block">


                    <div class="wizard show-submit">                                
                        <ul>
                            <li>
                                <a href="#step-1">
                                    <span class="stepNumber">1</span>
                                    <span class="stepDesc"><i class="fa fa-calendar fa-3x"></i><br /><small>Choix de l'horaire</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="#step-2">
                                    <span class="stepNumber">2</span>
                                    <span class="stepDesc"><i class="fa fa-user fa-3x"></i><br /><small>S'authentifier</small></span>
                                </a>
                            </li>    
                            <li>
                                <a href="#step-3">
                                    <span class="stepNumber">3</span>
                                    <span class="stepDesc"><i class="fa fa-check fa-3x"></i><br /><small>Confirmation</small></span>
                                </a>
                            </li>
                        </ul>

                        <div id="step-1">   
                            <form method="POST">
                                <div class="form-group">
                                    <div class="col-md-8">
                                        <label for="confirmrdv">Vous êtes sur de prendre ce rendez-vous</label>
                                        <button class="btn btn-success" name ="confirmrdv" id ="confirmrdv" type="submit"><b>Confirmer</b></button>
                                        <a class="btn btn-danger" name ="annulrdv" id ="annullrdv"><b>Annuler</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </form>
                </div>   
            </div>
        </div>

        <div id="footer-container"></div>



        <!--calendrier-->
        <script src="assets/js/calendrier.js"></script>


        <!-- THIS PAGE PLUGINS -->    
        <script type="text/javascript" src="admin/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js"></script>        



        <script type="text/javascript" src="admin/js/pluginsstep3.js"></script>             
        <!-- END THIS PAGE PLUGINS-->        

        <script>
            var map;

            var longitudec = parseFloat(<?php echo $professionnel->getLocalisation()->getLongetude() ?>);
            var latitudec = parseFloat(<?php echo $professionnel->getLocalisation()->getLatitude() ?>);
            function initMap() {
                var map = new google.maps.Map(document.getElementById('gmap'), {
                    zoom: 8,
                    center: {lat: latitudec, lng: longitudec}
                });

                var marker = new google.maps.Marker({
                    position: {lat: latitudec, lng: longitudec},
                    map: map
                });
            }



        </script>
        <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZrOwx3TRZhHiUL2HbUcrtfoFsEaqhcdE&callback=initMap"></script>

    </body>
</html>
