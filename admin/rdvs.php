<?php
require_once __DIR__ . '/../app/bootstrap.php';

include __DIR__ . '/controlleur/sessionAdmin.php';
$rdvs = $em->getRepository('rdv')->findAll();
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
                                    <h3 class="panel-title">Rendez-vous</h3>

                                </div>

                                <div class="panel-body">                                                                        

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Heure Début</th>
                                                <th>Heure Fin</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rdvs as $rdv): ?>
                                                <tr>
                                                    <td><?php echo $rdv->getDate()->format("j/m/y") ?></td>
                                                    <td><?php echo $rdv->getHeure_debut()->format("h:i:s") ?></td>
                                                    <td><?php echo $rdv->getHeure_fin()->format("h:i:s") ?></td>
                                                    <td>

                                                        <a href="controlleur/supprimerReclamation.php?id=<?php echo $rdv->getId() ?>" style="color: red" ><i class="fa fa-trash-o fa-2x"></i></a>
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