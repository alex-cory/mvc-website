<?php
// did it work?
// ini_set("auto_prepend_file","/Applications/MAMP/bin/php/php5.5.10/prepend.php");
// require_once '/Applications/MAMP/bin/php/php5.5.10/conf/prepend.php';
// require_once '/Applications/MAMP/bin/php/php5.5.10/conf/kint/Kint.class.php';

// require_once '/Library/Application Support/appsolute/MAMP PRO/conf/kint/Kint.class.php';
// dd($_SERVER);
// phpinfo();
// die('hello world');

# Display errors in production mode
// ini_set('display_errors', '0');
error_reporting(E_ALL & E_ERROR);
ini_set('display_errors', 1);

// error_reporting(error_reporting() & ~E_DEPRECATED);
// if(defined('E_DEPRECATED'))
// {
//     error_reporting(error_reporting() & ~E_DEPRECATED);
// }

// if(defined('E_DEPRECATED'))
// {
//     error_reporting(E_ALL | E_STRICT &~ E_DEPRECATED);
// }
// ini_set("error_reporting", E_ALL & ~E_DEPRECATED);
// echo ini_get("error_reporting");
// error_reporting(E_ALL ^ E_DEPRECATED);
// error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
// if(!defined('E_DEPRECATED')) { define('E_DEPRECATED',''); }
// if(!defined('E_USER_DEPRECATED')) { define('E_USER_DEPRECATED',''); }
// let's get started
require 'application/router.php';
