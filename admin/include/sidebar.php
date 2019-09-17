<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li>
            <a href="../index.php" style="font-size: 20px"> <i class="fa fa-play-circle"></i> <span class="light">Rendevoo </span><span style="background:#EF473A"> .tn</span></a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="assets/images/users/admin.jpg" alt="Administrateur"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="assets/images/users/admin.jpg" alt="Administrateur"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name"> <?php
                        echo $_SESSION['user']->getNom();
                        echo ' ' . $_SESSION['user']->getPrenom();
                        ?> </div>
                    <div class="profile-data-title">Administrateur</div>
                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>                                                                        
        </li>

        <li>
            <a href="index"><span class="fa fa-tachometer"></span> <span class="xn-text">Tableau de bord</span></a>
        </li> 
        <li class="xn-openable">
            <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Utilisateurs</span></a>
            <ul>
                <li>
                    <a href="admins"><span class="fa fa-user"></span> <span class="xn-text">Admin</span></a>
                </li>     
                <li>
                    <a href="professionnels"><span class="fa fa-briefcase"></span> <span class="xn-text">Professionnel</span></a>
                </li>  
                <li>
                    <a href="clients"><span class="fa fa-male"></span> <span class="xn-text">Client</span></a>
                </li> 
            </ul>
        </li>
        <li>
            <a href="rdvs"><span class="fa fa-clock-o"></span> <span class="xn-text">Rendez-vous</span></a>
        </li>
        <li>
            <a href="domaines"><span class="fa fa-list"></span> <span class="xn-text">Domaine</span></a>
        </li>
        <li>
            <a href="specialites"><span class="fa fa-list"></span> <span class="xn-text">Spécialité</span></a>
        </li>
        <li>
            <a href="reclamations"><span class="fa fa-exclamation-triangle"></span> <span class="xn-text">Réclamtion</span></a>
        </li>
        <li>
            <a href="messages"><span class="fa fa-envelope-o"></span> <span class="xn-text">Message</span></a>
        </li>
        <li>
            <a href="notifications"><span class="fa fa-bell"></span> <span class="xn-text">Notification</span></a>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR --