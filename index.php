<?php

// Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Require the autoload file
require_once("vendor/autoload.php");
require_once("model/data-layer.php");

// Start a session AFTER requiring autoload.php
session_start();

// Instantiate my classes
$f3 = Base::instance();
$validator = new Validate();
$controller = new Controller($f3, $validator);
//$db = new Database();

// Default route
$f3->route('GET|POST /', function() {
    $GLOBALS['controller']->home();
});

//  personal route
$f3->route('GET|POST /personal', function() {
    $GLOBALS['controller']->personal();
});

// motorcycle route
$f3->route('GET|POST /motor', function() {
    $GLOBALS['controller']->motor();
});

// vehicle information form route
$f3->route('GET|POST /vehicleForm', function() {
    $GLOBALS['controller']->vehicleForm();
});

// engine interior
$f3->route('GET|POST /engineInterior', function() {
    $GLOBALS['controller']->engineInterior();
});

// summary route
$f3->route('GET|POST /summary', function() {
    $GLOBALS['controller']->summary();
});

// summary route
$f3->route('GET|POST /msummary', function() {
    $GLOBALS['controller']->msummary();
});

//Run F3
$f3->run();