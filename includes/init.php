<?php
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT', DS . 'Applications' . DS . 'MAMP' . DS . 'htdocs' . DS . 'new_gallery');

defined('DATABASE_PATH') ? null : define('DATABASE_PATH', SITE_ROOT . DS . 'database');
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT . DS . 'includes');
defined('OBJECTS_PATH') ? null : define('OBJECTS_PATH', SITE_ROOT . DS . 'objects');

// DATABASE PATH
require_once(DATABASE_PATH . DS . 'config.php');
require_once(DATABASE_PATH . DS . 'database.php');

// INCLUDES PATH
require_once(INCLUDES_PATH . DS . 'functions.php');
require_once(INCLUDES_PATH . DS . 'init.php');
require_once(INCLUDES_PATH . DS . 'session.php');

// OBJECTS PATH
require_once(OBJECTS_PATH . DS . 'objects.php');
?>