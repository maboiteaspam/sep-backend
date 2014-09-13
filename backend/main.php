<?

// # Main file
// hello there,
// welcome in the main entrance point
// of this backend application

// declare globals
//----------------
$env = null;
$vendors_path = __DIR__."/../vendors";

// # library loading

// autoloader
//----------------
/* @var $auto_loader callback */
$auto_loader = require("$vendors_path/Sep/Sep.php");

// vendors
//----------------
require("$vendors_path/Slim-2.4.3/Slim/Slim.php");
require("$vendors_path/idiorm-1.4.1/idiorm.php");
require("$vendors_path/paris-1.4.2/paris.php");
require("$vendors_path/PHPExcel_1.8.0/Classes/PHPExcel.php");
spl_autoload_register($auto_loader("$vendors_path/Sep/"));
spl_autoload_register($auto_loader("$vendors_path/Validation/library/"));
\Slim\Slim::registerAutoloader();

// app specific
//----------------
spl_autoload_register($auto_loader(__DIR__."/../db/Models/"));

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
$backend->init($env,["$vendors_path/Sep/",__DIR__."/..",__DIR__]);

// Set internationalization
//----------------
// load user languages from config
// load preferred language from cookie
// fallback to first user languages
$backend->load_intl_messages($dirs=[],$language=null);

// render app
//----------------
// load view models
// create layout renderer
// create login/language routes
// create model routes
$backend->load_app();

// # Run your application
$backend->app->run();