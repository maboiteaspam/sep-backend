<?

// # Main file
// hello there,
// welcome in the database schema loader

// declare globals
//----------------
$env = null;
$config = null;
$app = null;

// # library loading

// autoloader
//----------------
/* @var $auto_loader \Composer\Autoload\ClassLoader */
$auto_loader = require(__DIR__."/../vendor/autoload.php");


// config
//----------------
$model_paths = [
    __DIR__."/../db/Models/",
    $auto_loader->getPrefixes()["Sep"][0]."/db/Models/"
];
$fixture_paths = [
    __DIR__."/../db/Fixtures/",
    $auto_loader->getPrefixes()["Sep"][0]."/db/Fixtures/"
];
$config_paths = [
    $auto_loader->getPrefixes()["Sep"][0],
    __DIR__."/..",
    __DIR__,
];



// app specific
//----------------
foreach($model_paths as $m ){
    $auto_loader->add("",$m);
}

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
$cli->init($env,$config_paths);

// # run application

// create schema
//----------------
if( $cli->action == "schema" ){
    $cli->setupSchema($model_paths,__DIR__."/schema/");

// create fixtures
//----------------
}else if( $cli->action == "fixtures" ){
    $cli->setupFixtures($fixture_paths);

// make a dump of your database
//----------------
}else if( $cli->action == "dump" ){
    $cli->createDump($model_paths);
}

