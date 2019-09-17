<?php 

require_once __DIR__ . '/../app/bootstrap.php';
$user = $em->getRepository('User')->find($_SESSION['user']->getId());

//modifier email
if (isset($_POST['enreglogin'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceProfessionnel');
    }
}
//modifier nom et prénom
if (isset($_POST['enregname'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceProfessionnel');
    }
}
//modifier Données personnels
if (isset($_POST['enregdp'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceProfessionnel');
    }
}
//modifier Données professionnel
if (isset($_POST['enregdescription'])) {
$professionnel->chargement($_POST['professionnel']);
    $user->chargement($_POST['user']);

    $erreurs = $professionnel->getErreurs();
    if ($professionnel->isValide()) {
        $em->flush();
        header('Location: espaceProfessionnel');
    }
}
//modifier password
if (isset($_POST['enregmdp'])) {
    if ($user->getPassword() == md5($_POST['currmdp'])) {
        if ($_POST['confirmmdp'] == $_POST['newmdp']) {

            $user->chargement($_POST['user']);

            $erreurs = $user->getErreurs();
            if ($user->isValide()) {
                $em->flush();
                header('Location: espaceProfessionnel');
            }
        }
        else {
        $erreurs[] = "les deux mots de passe ne sont pas identiques!";
    }
    }
    else {
        $erreurs[] = "Vérifier votre mot de passe actuel !";
    }
}

