<?php include './controlleur/loginClientControl.php'; ?>

<html>
    <?php include './include/head.php'; ?>
    <?php include './include/alert.php'; ?>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>

        </div>

        <div id="main-container">
            <div class="container" style="padding-top:30px;">
                <div class="row">
                    <div class="col-md-6 col-sm-offset-3">
                        <div class="panel panel-login">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <a href="#" class="active" id="login-form-link">Connectez-vous</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="#" id="forgot-form-link">Récupérer Mot De Passe</a>
                                    </div>
                                    <div class="col-xs-4">
                                        <a href="#" id="register-form-link">Nouveau Compte</a>
                                    </div>

                                </div>
                                <hr>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <form data-toggle="validator" id="login-form" action="" method="post" role="form" style="display: block;">
                                            <div class="form-group has-feedback">
                                                <input name="email" type="email" id="email" placeholder="Adresse E-mail" value="<?php echo $email ?>" class="form-control" required>   
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input name="password" type="password" data-minlength="8" id="pass" class="form-control" placeholder="Mot de passe" data-error="mot de passe doit être de 8 caractères ou plus" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-4 col-sm-offset-4">
                                                        <button class="form-control btn btn-login" name ="submitconnect" id ="submitconnect" type="submit"><b>Login</b></button><br><br>
                                                        <a onclick="facelog()" id="fbLink"><img style="width: 250px; height: 40px;" src="assets/img/fblogin.png"/></a><br><br>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form data-toggle="validator" id="register-form" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" name="register-form" action="" method="post" role="form" style="display: none;">

                                            <div class="form-group has-feedback">
                                                <input type="text" name="user[prenom]" value="<?php echo $user->getPrenom() ?>" placeholder="Prénom" class="form-control" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="text" name="user[nom]" class="form-control" value="<?php echo $user->getNom() ?>" placeholder="Nom" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="fichier_a_uploader">Avatar :</label>
                                                <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
                                                <input name="fichier" type="file" id="fichier_a_uploader">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <input type="email" class="form-control" name="user[email]" placeholder="Adresse E-mail" value="<?php echo $user->getEmail() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <input type="password" data-minlength="8" name="user[password]" class="form-control" data-error="mot de passe doit être de 8 caractères ou plus"  placeholder="Mot de passe" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <input type="text" name="user[adresse]" class="form-control" value="<?php echo $user->getAdresse() ?>" placeholder="Adresse : numéro, rue..."  required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <input type="number" name="user[codePostal]" class="form-control" value="<?php echo $user->getCodePostal() ?>" placeholder="Code postal" required>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <input type="text" name="user[ville]" placeholder="Ville" value="<?php echo $user->getVille() ?>" class="form-control" required>       
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group has-feedback">
                                                <input type="number" name="user[tel]" id="regtel" placeholder="Numéro de téléphone" value="<?php echo $user->getTel() ?>" class="form-control" required>       
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                                <div class="help-block with-errors"></div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button type="submit" name="submitsubscribe" id="submitsubscribe" class="form-control btn btn-register"><b>S'inscrire</b></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <form data-toggle="validator" id="forgot-form" action="" method="post" role="form" style="display: none;">
                                            <!--<p>Si vous avez perdu vos identifiants pour un compte précédemment crée chez Rendevoo, utilisez le lien ci-dessous pour récupérer un nouveau mot de passe qui vous sera envoyé par email</p>-->
                                            <div class="form-group">
                                                <input id="forgotemail" name="forgotemail" type="email" placeholder="Adresse E-mail" class="form-control" required>   
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-sm-6 col-sm-offset-3">
                                                        <button class="form-control btn btn-login" name ="submitforgot" id ="submitforgot" type="submit"><b>Envoyer</b></button>
                                                    </div>
                                                </div>
                                            </div> 
                                        </form>
                                        <b>Vous êtes un professionnel ? </b><a href="loginProfessionnel"><b> Connectez-vous ici</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(function () {
                    $('#login-form-link').click(function (e) {
                        $("#login-form").delay(100).fadeIn(100);
                        $("#register-form").fadeOut(100);
                        $("#forgot-form").fadeOut(100);
                        $('#register-form-link').removeClass('active');
                        $('#forgot-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                    });
                    $('#register-form-link').click(function (e) {
                        $("#register-form").delay(100).fadeIn(100);
                        $("#login-form").fadeOut(100);
                        $("#forgot-form").fadeOut(100);
                        $('#login-form-link').removeClass('active');
                        $('#forgot-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                    });
                    $('#forgot-form-link').click(function (e) {
                        $("#forgot-form").delay(100).fadeIn(100);
                        $("#login-form").fadeOut(100);
                        $("#register-form").fadeOut(100);
                        $('#login-form-link').removeClass('active');
                        $('#register-form-link').removeClass('active');
                        $(this).addClass('active');
                        e.preventDefault();
                    });
                });
            </script>
            <script>
                function facelog() {
                    window.fbAsyncInit = function () {
                        // FB JavaScript SDK configuration and setup
                        FB.init({
                            appId: '228023821015857', // FB App ID
                            cookie: true, // enable cookies to allow the server to access the session
                            xfbml: true, // parse social plugins on this page
                            version: 'v2.8' // use graph api version 2.8
                        });

                        // Check whether the user already logged in
                        FB.getLoginStatus(function (response) {
                            if (response.status === 'connected') {
                                //display user data
                                getFbUserData();
                            }
                        });
                    };

                    // Load the JavaScript SDK asynchronously
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id))
                            return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                    fbLogin();
                    // Facebook login with JavaScript SDK
                    function fbLogin() {
                        FB.login(function (response) {
                            if (response.authResponse) {

                                window.location.assign("http://localhost/rdv/index");
                                // Get and display the user profile data
                                getFbUserData();
                            } else {
                                toastr.warning('User cancelled login or did not fully authorize.');
                            }
                        }, {scope: 'email'});
                    }

                    // Fetch the user profile data from facebook
                    function getFbUserData() {
                        FB.api('/me', {locale: 'en_US', fields: 'id,first_name,last_name,email,link,gender,locale,picture'},
                                function (response) {
                                    saveUserData(response);
                                });
                    }

                    // Save user data to the database
                    function saveUserData(userData) {
                        $.post('controlleur/FBuserData.php', {oauth_provider: 'facebook', userData: JSON.stringify(userData)}, function (data) {
                            return true;
                        });
                    }



                    // Logout from facebook
                    function fbLogout() {
                        FB.logout(function () {
                            document.getElementById('fbLink').setAttribute("onclick", "fbLogin()");
                            document.getElementById('fbLink').innerHTML = '<img src="fblogin.png"/>';
                            document.getElementById('userData').innerHTML = '';
                            document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
                        });
                    }
                }
            </script>

        </div>

        <div id="footer-container"></div>


    </body>
</html>
