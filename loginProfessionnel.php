<?php
include './controlleur/loginProfessionnelControl.php';
$domaines = $em->getRepository('Domaine')->findAll();
?>
<html>
    <?php include './include/head.php'; ?>
    <link rel="stylesheet" type="text/css" id="theme" href="admin/css/theme-default.css"/>
    <?php include './include/alert.php'; ?>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>

        <div id="main-container">
            <div class="login-container lightmode">
                <div class="login-box animated fadeInDown">
                    <div class="login-body">
                        <div class="login-title"><strong>Se connecter</strong> à votre compte <strong>professionnel</strong></div>
                        <div class="row">
                            <div class="col-xs-4">
                                <a href="#"  class="active" id="login-form-link">Connectez-vous</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" id="forgot-form-link">Récupérer Mot De Passe</a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" id="register-form-link">Nouveau Compte</a>
                            </div>

                        </div>
                        <!--login form-->
                        <form data-toggle="validator" action="" id="login-form" class="form-horizontal" method="post">
                            <div class="form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="email" name="email" id="email" value="<?php echo $email ?>" class="form-control" placeholder="Adresse E-mail" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Mot de passe" data-minlength="8" data-error="mot de passe doit être de 8 caractères ou plus" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-lg-offset-3">
                                    <button name="submitconnect" id="submitconnect" class="btn btn-info btn-block">Se connecter</button>
                                </div>
                            </div>
                        </form>

                        <!--rappel mot de passe form-->
                        <form data-toggle="validator" action="" id="forgot-form" class="form-horizontal" method="post" style="display: none">
                            <div class="form-group has-feedback">
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="Adresse E-mail" required>
                                    <div class="help-block with-errors"></div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-lg-offset-3">
                                    <button name="submitforgot" id="submitforgot" class="btn btn-info btn-block">Envoyer</button>
                                </div>
                            </div>
                        </form>

                        <!--register form-->
                        <form data-toggle="validator" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" action="" class="form-horizontal" id="register-form" method="post" style="display: none">
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
                                <label for="specialite">Specialité :</label>
                                <select name="specialite" id="specialite" class ="js-example-basic-single" style="width: 200px" required>
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
                            <input type="hidden" name="lng" id="lng">
                            <input type="hidden" name="lat" id="lat">
                            <div class="form-group has-feedback">
                                <input type="text" name="user[adresse]" class="form-control" onblur="getLocation()" value="<?php echo $user->getAdresse() ?>" placeholder="Adresse : numéro, rue..."  required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="user[codePostal]" class="form-control" value="<?php echo $user->getCodePostal() ?>" placeholder="Code postal" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="user[ville]" placeholder="Ville" value="<?php echo $user->getVille() ?>" class="form-control" required>       
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="user[tel]" id="regtel" placeholder="Numéro de téléphone" value="<?php echo $user->getTel() ?>" class="form-control" required>       
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group has-feedback">
                                <textarea name="description" id="description" placeholder="Déscription" class="form-control" required></textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-lg-offset-3">
                                    <button name="submitsubscribe" id="submitsubscribe" class="btn btn-info btn-block">S'inscrire</button>
                                </div>
                            </div>
                        </form>
                        <br><b>Vous êtes un Client ? </b><a href="loginClient"><b> Connectez-vous ici</b></a>

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
                function getLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(showPosition);
                    } else {
                        toastr.error('Geolocation is not supported by this browser ');
                    }
                }
                function showPosition(position) {
                    $("#lat").val(position.coords.latitude);
                    $("#lng").val(position.coords.longitude);
                    toastr.success('Votre position a été localisé avec succés');
                }
            </script>
            <link href="assets/css/select2.css" rel="stylesheet">

            <script src='assets/js/select2.js'></script>
            <script type="text/javascript">
                $(".js-example-basic-single").select2({
                    placeholder: "Activité : Médecin, coiffeur...",
                    allowClear: true
                });
            </script>
        </div>

        <div id="footer-container"></div>


    </body>
</html>
