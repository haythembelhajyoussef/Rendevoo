<?php
require_once __DIR__ . '/../app/bootstrap.php';

include __DIR__ . '/controlleur/sessionAdmin.php';
$messages = $em->getRepository('Contact')->findAll();
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
                                    <h3 class="panel-title">Message</h3>

                                </div>

                                <div class="panel-body">                                                                        

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Sujet</th>
                                                <th>Contenu</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($messages as $message): ?>
                                                <tr>
                                                    <td><?php echo $message->getEmail() ?></td>
                                                    <td><?php echo $message->getNom() ?></td>
                                                    <td><?php echo $message->getPrenom() ?></td>
                                                    <td><?php echo $message->getSujet() ?></td>
                                                    <td><?php echo $message->getContenu() ?></td>
                                                    <td>
                                                        <a href="controlleur/supprimerMessage.php?id=<?php echo $message->getId() ?>" style="color: red" ><i class="fa fa-trash-o fa-2x"></i></a>
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






