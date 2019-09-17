<?php
require_once __DIR__ . '/../app/bootstrap.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-custom navbar-fixed-top top-nav-collapse" role="navigation">
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
                    <a class="page-scroll fa fa-search" href="recherche"> Rechercher</a>
                </li>
                <li>
                    <a class="page-scroll" href="contact">Contact</a>
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
<!-- Bootstrap Core JavaScript -->
<script src="assets/js/bootstrap.js"></script> 
