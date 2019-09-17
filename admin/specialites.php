<?php
require_once __DIR__ . '/../app/bootstrap.php';

include __DIR__ . '/controlleur/sessionAdmin.php';
$specialites = $em->getRepository('Specialite')->findAll();
?>
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


                <!-- END PAGE TITLE -->                

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading ui-draggable-handle">
                                    <h3 class="panel-title">Spécialité</h3>
                                </div>
                                <div class="panel-footer">
                                    <a href="ajoutSpecialite" class="btn btn-primary pull-right">Ajouter <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                                </div>
                                <div class="panel-body">                                                                        
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($specialites as $specialite): ?>
                                                <tr>
                                                    <td><?php echo $specialite->getNom() ?></td>
                                                    <td>
                                                        <a href="modifierSpecialite.php?id=<?php echo $specialite->getId() ?>" ><i class="fa fa-edit fa-2x"></i></a>
                                                        <a href="controlleur/supprimerSpecialite.php?id=<?php echo $specialite->getId() ?>" style="color: red" ><i class="fa fa-trash-o fa-2x"></i></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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