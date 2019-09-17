<?php




require_once __DIR__ .'/app/bootstrap.php';
use Doctrine\ORM\Tools\Console\ConsoleRunner;


return ConsoleRunner::createHelperSet($em);