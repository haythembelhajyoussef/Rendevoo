<?php

if(!isset($_SESSION['user'])){
      header('Location: login');
}

if(!in_array("ADMIN", $_SESSION['user']->getRole())){
      header('Location: login');
}


