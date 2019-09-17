<?php include 'controlleur/loginAdmin.php'; ?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Admin Rendevoo.tn</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->

        <script src="js/jquery.js"></script>
        <script src='js/validator.js'></script>

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <?php include 'include/alert.php'; ?>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>

        <div class="login-container">

            <div class="login-box animated fadeInDown">

                <div class="login-body">
                    <div class="login-title"><strong>Se connecter</strong></div>
                    <form data-toggle="validator" action="" class="form-horizontal" method="post">
                        <div class="form-group has-feedback">
                            <div class="col-md-12">
                                <input name="email" type="email" class="form-control" placeholder="E-mail" value="<?php echo $email ?>" required>
                                <div class="help-block with-errors"></div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group has-feedback">
                            <div class="col-md-12">
                                <input name="password" type="password" class="form-control" placeholder="Password" data-minlength="8" data-error="mot de passe doit être de 8 caractères ou plus" required>
                                <div class="help-block with-errors"></div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-md-6">
                                <button class="btn btn-info btn-block">Log In</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </body>
</html>