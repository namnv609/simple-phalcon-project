<?php

use Phalcon\DI,
    Phalcon\DI\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT_PATH', __DIR__);
define('PATH_LIBRARY', __DIR__ . '/../app/library/');
define('PATH_SERVICES', __DIR__ . '/../app/services/');
define('PATH_RESOURCES', __DIR__ . '/../app/resources/');
define('PATH_MODELS', __DIR__ . '/../app/models/');

set_include_path(
        ROOT_PATH . PATH_SEPARATOR . get_include_path()
);

include __DIR__ . "/vendor/autoload.php";

$config = include __DIR__ . "/../app/config/config.php";

$loader = new \Phalcon\Loader();

$loader->registerDirs(array(
    ROOT_PATH,
    $config->application->controllersDir,
    $config->application->modelsDir 
));

$loader->register();

$di = new FactoryDefault();
DI::reset();

$di['config'] = function() use($config) {
    return $config;
};

$di->set('db', function () use ($config) {
    return new DbAdapter(array(
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname
    ));
});
$di->set('modelsManager', function(){
    return new \Phalcon\Mvc\Model\Manager();
});

DI::setDefault($di);

