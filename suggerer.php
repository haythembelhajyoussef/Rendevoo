<?php include './controlleur/suggererControl.php'; ?>
<html>
    <?php include './include/head.php'; ?>
    <?php include './include/alert.php'; ?>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>

        <div id="main-container">
            <form name="suggForm" method="POST" action="" id="suggForm" style="display: none; padding-top:100px;">
                <center><h1><strong>Votre Professionnel n'est pas sur Rendevoo ? </strong></h1></center>
                <center><b>Faites lui découvrir la prise de rendez-vous en ligne.<br>
                        Nous contacterons votre professionnel de votre part !</b></center><br>
                <center> Vous</center><br>

                <center> <div> <a><input class="input-xlarge" name="sugnom" type="text" id="sugnom" value="" disabled ></a>
                        <a><input class="input-xlarge" name="sugprenom" type="text" id="sugprenom" value="" disabled></a>  
                        <a><input class="input-xlarge" name="sugemail" type="email" id="sugemail" value="" disabled></a><br></div></center><br>
                <center>Votre Professionnel</center><br>

                <center> <div>  
                        <a><input  class="input-xxlarge" name="nomprof" type="text" id="nomprof" value="" placeholder="Nom" required></a> 
                        <a><input class="input-xxlarge" name="telprof" type="text" id="telprof" value="" placeholder="Téléphone" required></a>
                        <a><input class="input-xxlarge" name="domaine" type="text" id="domaine" value="" placeholder="Domaine" required></a>
                        <a><input class="input-xxlarge" name="email" type="email" id="email" value="" placeholder="Adresse Email" required></a>
                    </div> <br><br>

                    <button  class="btn btn-large" name="recommander" id="recommander">Recommander votre professionnel</button></center>
            </form>
        </div>
        <div id="footer-container"></div>
    </body>
</html>