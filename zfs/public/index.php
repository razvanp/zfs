<?php


define("WEBROOT", realpath(dirname(__FILE__)));


// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));




/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();


function pr($value){
    echo '<pre style="text-align: left; overflow: auto; border: 3px solid #F3FF8F; background: black; color: #F3FF8F; padding: 10px; margin: 10px;" title="">';
    Zend_Debug::dump($value);
    echo '</pre>';
}
