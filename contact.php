<?php include './controlleur/contactControl.php'; ?>
<html>
    <?php include './include/head.php'; ?>
    <?php include './include/alert.php'; ?>
    <body> 
        <p id="top"> </p>
        <div id="header-container">
            <?php include './include/header.php'; ?>
        </div>

        <div id="main-container">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-offset-3">

                        <h1>Contactez-Nous</h1>
                        Une remarque, une question, ou tout simplement envie de discuter ? Contactez-nous et nous vous répondrons dans les meilleurs délais.
                        <br><br>
                        <form data-toggle="validator" name="contactfrm" action="" method="POST" role="form">
                            <div class="form-group has-feedback">
                                <input type="email" class="form-control" name="contact[email]" placeholder="Adresse E-mail" data-error="Adresse e-mail invalide!" required>
                                <div class="help-block with-errors"></div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="contact[nom]" class="form-control" placeholder="Nom"  required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="contact[prenom]" class="form-control" placeholder="Prénom" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="text" name="contact[sujet]" placeholder="Sujet" class="form-control" required>       
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group has-feedback">
                                <textarea type="text" name="contact[contenu]" placeholder="Ecrivez votre message" class="form-control" required>       </textarea>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6 col-sm-offset-3">
                                        <button type="submit" name="contactbtn" id="contactbtn" class="form-control btn btn-register"><b>Envoyer</b></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>   
                </div>
            </div>
        </div>
        <div id="footer-container"></div>


    </body>
</html>