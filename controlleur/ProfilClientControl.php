<?php

require_once __DIR__ . '/../app/bootstrap.php';
$user = $em->getRepository('User')->find($_SESSION['user']->getId());
//modifier email
if (isset($_POST['enreglogin'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceClient');
    }
}
//modifier nom et prénom
if (isset($_POST['enregname'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceClient');
    }
}
//modifier Données personnels
if (isset($_POST['enregdp'])) {

    $user->chargement($_POST['user']);

    $erreurs = $user->getErreurs();
    if ($user->isValide()) {
        $em->flush();
        header('Location: espaceClient');
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
                header('Location: espaceClient');
            }
        } else {
            $erreurs[] = "les deux mots de passe ne sont pas identiques!";
        }
    } else {
        $erreurs[] = "Vérifier votre mot de passe actuel !";
    }
}
if (isset($_POST['user[avatar]'])) { // si formulaire soumis
    $content_dir = 'assets/userImage/'; // dossier où sera déplacé le fichier

    $tmp_file = $_FILES['fichier']['tmp_name'];

    if (!is_uploaded_file($tmp_file)) {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if (!strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'png') && !strstr($type_file, 'gif')) {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if (!move_uploaded_file($tmp_file, $content_dir . $name_file)) {
        exit("Impossible de copier le fichier dans $content_dir");
    }
    $URL = $content_dir . $name_file;
    $user->chargement($_POST['user']);
    $user->setAvatar($URL);
    $em->persist($user);
    $em->flush();
    echo "Le fichier a bien été uploadé";
}