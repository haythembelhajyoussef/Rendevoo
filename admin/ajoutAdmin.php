<?php include 'controlleur/ajouterAdmin.php'; ?>
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

                    <div class="row">
                        <div class="col-md-12">

                            <form data-toggle="validator" class="form-horizontal" method="POST">
                                <div class="panel panel-default">
                                    <div class="panel-heading ui-draggable-handle">
                                        <h3 class="panel-title">Ajouter administrateur</h3>
                                    </div>
                                    <div class="panel-body">   

                                        <div class="form-group has-feedback">
                                            <label class="col-md-3 col-xs-12 control-label">Prénom</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[prenom]" type="text" class="form-control" required value="<?php echo $user->getPrenom() ?>">
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="col-md-3 col-xs-12 control-label">Nom</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[nom]" type="text" class="form-control" value="<?php echo $user->getNom() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="col-md-3 col-xs-12 control-label">Adresse E-mail</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[email]" type="email" class="form-control" value="<?php echo $user->getEmail() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group has-feedback">
                                            <label class="col-md-3 col-xs-12 control-label">Mot de passe</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[password]" type="password" class="form-control" data-minlength="8" data-error="mot de passe doit être de 8 caractères ou plus" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Adresse : numéro, rue...</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[adresse]" type="text" class="form-control" value="<?php echo $user->getAdresse() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Code postal</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[codePostal]" type="text" class="form-control" value="<?php echo $user->getCodePostal() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Ville</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[ville]" type="text" class="form-control" value="<?php echo $user->getVille() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Numéro de téléphone</label>
                                            <div class="col-md-6 col-xs-12">                                            
                                                <input name="user[tel]" type="text" class="form-control" value="<?php echo $user->getTel() ?>" required>
                                                <div class="help-block with-errors"></div>
                                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-default"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Retour</button>                                    
                                        <button class="btn btn-primary pull-right">Ajouter <i class="fa fa-check" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        <?php include_once 'include/logout.php'; ?>

        <?php include_once 'include/preloads.php'; ?>


    </body>
</html>