<?php

require_once __DIR__ . "/application.php"; //
if (!isset($_SESSION)) {
    session_start();
}