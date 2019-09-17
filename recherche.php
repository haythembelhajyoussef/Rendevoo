<?php
include './controlleur/rechercheControl.php';
$domaines = $em->getRepository('Domaine')->findAll();
?>

<html>
    <?php include './include/head.php'; ?>
    <style>
        th {
            background: #006a72;
        }
    </style>
    <?php include './include/alert.php'; ?>
    <link href="assets/css/calendrier.css" rel=stylesheet>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>
        <div id="main-container">
            <div class="container col-md-offset-1">
                <div class="col-lg-10">
                    <form class="form-inline polina" id="rechspec" name='rechspec' role="form" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom ?>">
                        </div>
                        <div class="form-group">
                            <label for="specialite">Ou</label>
                            <select name="specialite" onchange="this.form.submit()" class ="js-example-basic-single" style="width: 200px" required>
                                <?php foreach ($domaines as $domaine) : ?>
                                    <option></option>
                                    <optgroup label="<?php echo $domaine->getNom() ?>">
                                        <?php foreach ($domaine->getSpecialite() as $specialite) : ?>
                                            <option <?php
                                            if ($specialite->getId() == $spec) {
                                                echo 'selected';
                                            }
                                            ?> value="<?php echo $specialite->getId() ?>"><?php echo $specialite->getNom() ?></option>
                                            <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>

                        </div>
                        <div class="form-group input-group">
                            <input type="text" class="form-control" name="ville" id="ville" placeholder="Oû ?(adresse,ville...)" value="<?php echo $ville ?>">
                            <span class="input-group-addon"><i class="fa fa-map-marker"></i>
                            </span>
                        </div>
                        <button id="rechspecbtn" name="rechspecbtn" type="submit" class="btn btn-outline btn-danger">Rechercher</button>
                    </form>
                </div>
            </div>
            <!--Google map-->

            <div class="row">
                <div class="col-md-4" style="position: absolute; right: -2;padding-top: 20px">                           
                    <!-- START GOOGLE MAP WITH MARKER -->
                    <div class="panel panel-default">
                        <div class="panel-body panel-body-map">
                            <div id="gmap" style="width: 100%; min-height: 600px"></div>
                        </div>
                    </div>
                    <!-- END GOOGLE MAP WITH MARKER -->
                </div>                                               
            </div>
            <div class="resrech" style="height : 200px; width : 67%;">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Domaine/spécialité</th>
                            <th>Ville</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($professionnels as $professionnel):
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo $professionnel->getUser()->getAvatar() ?>" alt="" title="Avatar" width="60" height="70">
                                </td>
                                <td>
                                    <?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom(); ?> 
                                </td>
                                <td>
                                    <?php echo $professionnel->getSpecialite()->getDomaine()->getNom() . '/' . $professionnel->getSpecialite()->getNom(); ?> 
                                </td>
                                <td>
                                    <?php echo $professionnel->getUser()->getVille(); ?> 
                                </td>
                                <td>
                                    <a class="btn btn-danger" href='prendreRDV.php?idProf=<?php echo $professionnel->getId(); ?>'>Prendre RDV</a>
                                </td>
                                <td>
                        <position datatitre="<?php echo $professionnel->getUser()->getNom() . ' ' . $professionnel->getUser()->getPrenom() . ' ' . $professionnel->getUser()->getAdresse() ?>" datalongitude="<?php echo $professionnel->getLocalisation()->getLongetude() ?>" datalatitude="<?php echo $professionnel->getLocalisation()->getLatitude() ?>"></position>
                        </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;
                    ?>
                    </tbody>
                </table>
                <hr>
            </div>

            <!-- jQuery -->
            


            <!--calendrier-->
            <script src="assets/js/calendrier.js"></script>


            <!-- START THIS PAGE PLUGINS-->        

            <script type="text/javascript" src="admin/js/jquery.dynatable.js"></script>
            <link href="admin/css/jquery.dynatable.css" rel="stylesheet">   
            <link href="assets/css/select2.css" rel="stylesheet">
            <script src='assets/js/select2.js'></script>
            <script type="text/javascript">
                                $(".js-example-basic-single").select2({
                                    placeholder: "Activité : Médecin, coiffeur...",
                                    allowClear: true
                                });
                                $('table').dynatable({
                                    features: {
                                        search: false
                                    }
                                });
            </script>
            <script>
                var map;
                var e = $('position').first();
                var longitudec = parseFloat(e.attr('datalongitude'));
                var latitudec = parseFloat(e.attr('datalatitude'));
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('gmap'), {
                        zoom: 8,
                        center: {lat: latitudec, lng: longitudec}
                    });

                    $('position').each(function () {
                        var title = $(this).attr('datatitre');
                        var longitude = parseFloat($(this).attr('datalongitude'));
                        var latitude = parseFloat($(this).attr('datalatitude'));
                        var marker = new google.maps.Marker({
                            position: {lat: latitude, lng: longitude},
                            map: map,
                            title: title
                        });
                    });
                }



            </script>
            <script  async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZrOwx3TRZhHiUL2HbUcrtfoFsEaqhcdE&callback=initMap"></script>
    </body>
</html>
