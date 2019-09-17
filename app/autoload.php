<?php

function autoload($class){
    require_once __DIR__.'/../model/'. $class .'.php'; 
}
spl_autoload_register('autoload');