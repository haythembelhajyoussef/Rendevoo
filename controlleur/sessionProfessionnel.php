<?php

if(!isset($_SESSION['user'])){
      header('Location: loginProfessionnel');
}

if(!in_array("PROFESSIONNEL", $_SESSION['user']->getRole())){
      header('Location: loginProfessionnel');
}


