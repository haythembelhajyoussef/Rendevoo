<?php

require_once __DIR__ . '/../../app/bootstrap.php';

$user = new User();
$email ="";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email=$_POST['email'];
    $query = $em->createQuery('SELECT u FROM User u WHERE u.email = :email  AND u.password = :password');
    $query->setParameters(array(
        'email' => $email,
        'password' => md5($_POST['password'])
    ));
    $users = $query->getResult();

    if (!empty($users)) {
        $_SESSION['user'] = $users[0];
         header('Location: index');
    }
    else{
        $erreurs[] = "Vérifier votre email et mot de passe!";
    }
    
}




