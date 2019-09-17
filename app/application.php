<?php

require_once __DIR__ . "/autoload.php"; //
require_once __DIR__ . "/../vendor/autoload.php"; //
require_once __DIR__ . "/config.php"; //

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__ . "/../model");

// the connection configuration
$dbParams = array(
    'driver' => dbdriver,
    'user' => dbuser,
    'password' => dbpassword,
    'dbname' => dbname,
);

$config = Setup::createAnnotationMetadataConfiguration($paths, devMode);
$em = EntityManager::create($dbParams, $config);
