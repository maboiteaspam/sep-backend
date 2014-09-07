<?

// # Main file
// hello there,
// welcome in the database schema loader

// declare globals
//----------------
$env = null;
$config = null;
$app = null;
$vendors_path = __DIR__."/../vendors";
$models_path = __DIR__."/Models/";

// # library loading

// autoloader
//----------------
/* @var $auto_loader callback */
$auto_loader = require("$vendors_path/Sep/Sep.php");

// vendors
//----------------
require("$vendors_path/idiorm-1.4.1/idiorm.php");
require("$vendors_path/paris-1.4.2/paris.php");
require("$vendors_path/Illuminate-database/Illuminate/Support/helpers.php");
spl_autoload_register($auto_loader("$vendors_path/Illuminate-database/"));
spl_autoload_register($auto_loader("$vendors_path/Sep/"));

// app specific
//----------------
spl_autoload_register($auto_loader($models_path));

// # Configure and initialize

// Detect environment
//----------------
$env = include(__DIR__."/../env.php");

// Load cli bootstrap
//----------------
$cli = new \Sep\Bootstrap\Cli();

// Load the configuration
//----------------
// configure db/orm
$cli->init($env,["$vendors_path/Sep/",__DIR__."/..",__DIR__]);

// # run application

// create schema
//----------------
if( $cli->action == "schema" ){
    $cli->setupSchema($models_path);

// create fixtures
//----------------
}else if( $cli->action == "fixtures" ){
    $cli->setupFixtures();

// make a dump of your database
//----------------
}else if( $cli->action == "dump" ){
    $cli->createDump($models_path);
}

