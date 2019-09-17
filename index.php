<?php
include './controlleur/rechercheControl.php';
$domaines = $em->getRepository('Domaine')->findAll();
?>

<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Rendevoo.tn</title>


        <script src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="assets/css/font-awesome.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <!-- Theme CSS -->
        <link href="assets/css/grayscale.css" rel="stylesheet">
        <link href="assets/css/Style.css" rel="stylesheet">
        <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
        <!-- <link href="assets/css/profil.css" rel="stylesheet"> -->
        <link href="assets/css/fontello-embedded.css" rel="stylesheet">   


        <!-- Google Map -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApRGT6vpivET2Pj6jm0An2iKCqmJ29xwQ"></script> -->
        <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->

        <!-- TOASTr -->
        <link href="assets/css/toastr.css" rel="stylesheet">
        <script src="assets/js/toastr.js"></script>

        <!-- reCaptcha google -->
        <script src='https://www.google.com/recaptcha/api.js'></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="#" onclick="window.location.href = 'index'">
                        <i class="fa fa-play-circle"></i> <span class="light">Rendevoo </span><span style="background:#EF473A"> .tn</span>
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="menub" class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li>
                            <a class="page-scroll fa fa-search" href="#about"> Rechercher</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#accesProfessionnel">Accès professionnels</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#download">Accés client</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                        <li id="test">
                            <?php
                            if (!isset($_SESSION['user'])) :
                                ?>
                                <a id="auth" href="loginClient"> Se Connecter<i class="fa fa-sign-in"></i></a>
                                <?php
                            else :
                                ?>
                                <a id="auth" class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-user"></i> <?php
                                    $user = $em->getRepository('User')->find($_SESSION['user']->getId());
                                    echo $user->getNom();
                                    echo ' ' . $user->getPrenom();
                                    ?>
                                    <i class="fa fa-caret-down"></i></a>
                                <ul style="background: black;" class="dropdown-menu">
                                    <?php if (in_array("CLIENT", $user->getRole())) { ?>
                                        <li><a href="espaceClient" style="color:white">Espace client</a></li>
                                        <?php
                                    }
                                    if (in_array("PROFESSIONNEL", $user->getRole())) {
                                        ?>
                                        <li><a href="espaceProfessionnel" style="color:white">Espace professionnel</a></li>
                                        <?php
                                    }
                                    if (in_array("ADMIN", $user->getRole())) {
                                        ?>
                                        <li><a href="admin/index" style="color:white">Administration</a></li>
                                        <?php
                                    }
                                    ?>
                                        
                                    <li><a href="controlleur/deconnexion.php" style="color:white">Déconnexion</a></li>
                                </ul>
                            <?php
                            endif;
                            ?>
                        </li>
                        <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                            <li><span><img src="<?php echo $user->getAvatar(); ?>" class="img-circle" alt="" width="40" height="40"></span></li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
            <!-- /.container -->
        </nav>
        <!-- Intro Header -->
        <header class="intro">
            <div class="intro-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 class="brand-heading"><img src="assets/img/logo-300-60.png" alt="" width="300" height="60"></h1>
                            <p class="intro-text">PRENEZ RENDEZ-VOUS EN LIGNE !
                                <br>Médécins, vétérinaires, avocats, coiffeurs, auto-écoles ....</p>
                            <a href="#about" class="btn btn-circle page-scroll">
                                <i class="fa fa-angle-double-down animated"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- About Section -->
        <section id="about" class="container content-section text-center">
            <div class="col-lg-10 col-lg-offset-2">  			
                <form class="form-inline polina" id="rechspec" name='rechspec' role="form" action="recherche">
                    <video id="bgvid" autoplay muted loop>
                        <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
                        <source src="assets/videos/metiers.mp4" type="video/mp4">
                    </video>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom" value="<?php echo $nom ?>">
                    </div>
                    <div class="form-group">
                        <label for="specialite">Ou</label>
                        <select name="specialite" class ="js-example-basic-single" style="width: 200px" required>
                            <?php foreach ($domaines as $domaine) : ?>
                                <option></option>
                                <optgroup label="<?php echo $domaine->getNom() ?>">
                                    <?php foreach ($domaine->getSpecialite() as $specialite) : ?>
                                        <option <?php if ($specialite->getId() == $spec) echo 'selected'; ?> value="<?php echo $specialite->getId() ?>"><?php echo $specialite->getNom() ?></option>
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
        </section>

        <!-- accés professionnel Section -->
        <section  class="content-section text-center">
            <div id="accesProfessionnel" class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">
                        <article class="grid_1170">
                            <div class="bloc bloc-id-47 bloc-full">
                                <i class="fa fa-calendar" style="font-size:70px;"></i>
                                <h2>PROFESSIONNELS</h2>
                                <br><h6 style="color : #808080; font-weight: 400">Créer votre compte en quelques instants.
                                    <br>Notre service est GRATUIT, vous allez adorer !
                                    <br><br><strong>Les avantages ?</strong>
                                    <br>Gagnez du temps
                                    <br>Réduisez les RDV non-honorés
                                    <br>Faites vous connaître auprès de nouveaux clients ou patients
                                </h6>
                                <a href="loginProfessionnel" class="btn btn-default btn-lg">JE CRÉE MON COMPTE GRATUITEMENT</a>
                            </div>
                        </article>			
                    </div>
                </div>
            </div>
        </section>

        <!-- accés client Section -->
        <section class="content-section text-center">
            <div id="download" class="download-section">
                <div class="container">
                    <div class="col-lg-8 col-lg-offset-2">

                        <article class="grid_1170">
                            <div style="font-size:20px;">
                                <i class="fa fa-male" style="font-size:70px;"></i>
                                <i class="fa fa-female" style="font-size:70px;"></i>
                                <h2>Client ou patient</h2>
                                <p style="padding:20px;" class="fa fa-search " aria-hidden="true"><b> Trouvez le bon professionnel</b></p>
                                <p style="padding:20px;" class="fa fa-clock-o" aria-hidden="true"><b> Choisissez l'heure et la date du RDV</b></p>
                                <p style="padding:20px;" class="fa fa-check" aria-hidden="true"><b> Validez votre rendez-vous en ligne</b></p> 
                                <h2>PRENEZ RENDEZ-VOUS EN LIGNE
                                    <br>DÈS AUJOURD’HUI</h2>
                                <br><h5>Personnalisez votre agenda en fonction
                                    <br>de vos services et de vos disponibilités</h5>
                                <a href="loginClient"  class="btn btn-default btn-lg">JE CRÉE MON COMPTE GRATUITEMENT</a>
                            </div>
                        </article>					
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="container content-section text-center polina" style=" width: 70%;">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Contactez Nous</h2>
                    <p>N'hésitez pas à nous envoyer un e-mail pour nous faire part de vos commentaires, nous donner des suggestions pour de nouveaux fonctionnalités, ou simplement dire bonjour!</p>
                    <p>
                        <a href="contact" class="btn btn-default btn-lg"><i class="fa fa-envelope fa-fw"></i> <span class="network-name">Contactez nous</span></a>
                    </p>
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/Heythembhy" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/heythembhy" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/Heythembhy" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <div id="map"></div>



        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; 2017</p>
            </div>

            <a href="#page-top" class="btn btn-circle page-scroll">
                <i class="fa fa-angle-double-up animated"></i>
            </a>


        </footer>
        <!-- jQuery -->
        <script src="assets/js/jquery.js"></script> 

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.js"></script> 

        <!-- Plugin JavaScript -->
        <script src="assets/js/jquery.easing.min.js"></script>

        <!-- Theme JavaScript -->
        <script src="assets/js/grayscale.js"></script>


        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <link href="assets/css/select2.css" rel="stylesheet">

        <script src='assets/js/select2.js'></script>
        <script type="text/javascript">
                            $(".js-example-basic-single").select2({
                                placeholder: "Activité : Médecin, coiffeur...",
                                allowClear: true
                            });
        </script>
    </body>

</html>
