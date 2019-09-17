<?php

class Model {

    protected $erreurs=[];

    function chargement($data) {
        foreach ($data as $key => $value) {
            $mothod = 'set' . ucfirst($key);
            if (method_exists($this, $mothod)) {
                $this->$mothod($value);
            }
        }
    }

    function isValide(){
        if (empty($this->erreurs)) {
            return true;
        }
        return false;
    }
    
    function getErreurs() {
        return $this->erreurs;
    }

    function setErreurs($erreurs) {
        $this->erreurs = $erreurs;
    }


}
