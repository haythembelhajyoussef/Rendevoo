<?php

//Load the database configuration file
require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../app/dbConfig.php';

//Convert JSON data into PHP variable
$userData = json_decode($_POST['userData']);
if (!empty($userData)) {
    //Check whether user data already exists in database
    $prevQuery = "SELECT * FROM user WHERE email = '" . $userData->email . "'";

    $prevResult = $db->query($prevQuery);
    $role = 'a:1:{i:0;s:6:"CLIENT";}';
    if ($prevResult->num_rows > 0) {
        //Update user data if already exists
        $query = "UPDATE user SET prenom = '" . $userData->first_name . "', nom = '" . $userData->last_name . "', avatar = '" . $userData->picture->data->url . "' WHERE email = '" . $userData->email . "'";
        $update = $db->query($query);
        setcookie('userEmail', $userData->email, time() + (86400 * 2), "/");

        $query = $em->createQuery('SELECT u FROM User u WHERE u.email = :email');
        $query->setParameters(array(
            'email' => $userData->email
            ));
        $users = $query->getResult();

            $_SESSION['user'] = $users[0];
   
    } else {
        //Insert user data
        $query = "INSERT INTO user SET prenom = '" . $userData->first_name . "', nom = '" . $userData->last_name . "', email = '" . $userData->email . "', avatar = '" . $userData->picture->data->url . "', role = '" . $role . "', etat = '1'";
        $insert = $db->query($query);

        $check_q = "SELECT id FROM user WHERE email =  '$userData->email'";
        $check = $db->query($check_q);
        $check_row = $check->fetch_assoc();
        $id = $check_row['id'];

        $queryy = "INSERT INTO client SET user_id = '" . $id . "'";
        $insertt = $db->query($queryy);
        $_SESSION['user'] = $users[0];
    }
}
?>