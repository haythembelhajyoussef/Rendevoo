<?php

if(!isset($_SESSION['user'])){
      header('Location: loginClient');
}

if(!in_array("CLIENT", $_SESSION['user']->getRole())){
      header('Location: loginClient');
}


