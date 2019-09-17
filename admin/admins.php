<?php
require_once __DIR__ . '/../app/bootstrap.php';
include __DIR__ . '/controlleur/sessionAdmin.php';
$query = $em->createQuery("SELECT u FROM User u where  u.role like '%ADMIN%'");
$admins = $query->getResult();
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
                                    <h3 class="panel-title">Ajouter Administrateur</h3>
                                </div>
                                <div class="panel-footer">
                                    <a href="ajoutAdmin" class="btn btn-primary pull-right">Ajouter <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                                </div>
                                <div class="panel-body">                                                                        

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>email</th>
                                                <th>etat</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($admins as $admin): ?>
                                                <tr>
                                                    <td><?php echo $admin->getNom() ?></td>
                                                    <td><?php echo $admin->getPrenom() ?></td>
                                                    <td><?php echo $admin->getEmail() ?></td>
                                                    <td><?php echo $admin->getEtat() ? '<span class="label label-success">oui</span>' : '<span class="label label-danger">non</span>' ?></td>
                                                    <td>
                                                        <?php if ($admin->getEtat()): ?>
                                                            <a href="controlleur/bloquerUser.php?id=<?php echo $admin->getId() ?>" ><i class="fa fa-thumbs-down fa-2x"></i></a>

                                                        <?php else: ?>
                                                            <a href="controlleur/bloquerUser.php?id=<?php echo $admin->getId() ?>" ><i class="fa fa-thumbs-up fa-2x"></i></a>

                                                        <?php endif; ?>
                                                        <a href="controlleur/supprimerAdmin.php?id=<?php echo $admin->getId() ?>" style="color: red" ><i class="fa fa-trash-o fa-2x"></i></a>
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