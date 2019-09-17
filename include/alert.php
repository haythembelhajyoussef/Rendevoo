<?php

if(isset($erreurs)){

    if(!empty($erreurs)){
        $s="";
        foreach ($erreurs as $value) {
            $s.=$value;
        }

        echo '<script>alert("'.$s.'")</script>';
    }
}