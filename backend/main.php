<?

// # Main file
// hello there,
// welcome in the main entrance point
// of this backend application

// declare globals
//----------------
$env = null;

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

// Detect environment
//----------------
$env = include(__DIR__."/../env.php");

// Load backend bootstrap
//----------------
$backend = new \Sep\Bootstrap\Backend();

// Load the configuration
//----------------
// opens session
// configure db/orm
$backend->init($env,$config_paths);

// Set internationalization
//----------------
// load user languages from config
// load preferred language from cookie
// fallback to first user languages
$backend->load_intl_messages($language=null);

// initialize app
//----------------
// load view models
// create layout renderer
// create login/language routes
// create model routes
$backend->load_app();

// # Run your application
$backend->app->run();