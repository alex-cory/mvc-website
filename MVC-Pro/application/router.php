<?php
/**
 * The Router is just a place that, so to speak, gets things going.  It just routes various things to
 * different places.
 *
 * Right now it's just determining where to load files from AND instantiating the new Controller.
 */

// Starting Session
// throw new Exception('test');
session_start();
// die('here');

/**
 * Description:
 * Loads all the required files according to each class/file that is being used.
 *
 * @param  [type] $class [description]
 * @return [type]        [description]
 */
function autoloader($class)
{
	if (file_exists('application/' . strtolower($class) . '.php')) {

		//first check the application directory
		include_once('application/' . strtolower($class) . '.php');
	}
	elseif (file_exists('application/controllers/' . strtolower($class) . '.php')) {

		//then check the controller directory
		include_once('application/controllers/' . strtolower($class) . '.php');
	}
	elseif (file_exists('application/models/' . strtolower($class) . '.php')) {

		//finally check the models directory
		include_once( 'application/models/' . strtolower($class) . '.php');
	}
}

require_once('application/config.php');
spl_autoload_register('autoloader');


// ==================================================================
//
// DEBUG -- ERROR: undefined PATH_INFO
//
// ------------------------------------------------------------------
# Things I've tried
# - .htaccess : AcceptPathInfo On
# - 2 functions from stackOverflow http://goo.gl/ohPqdg
# $temp = $_SERVER['SCRIPT_NAME']; // R-Ouput: /alecory/Spring-2014/CIT-31300/Assignment 3/MVC-Pro/index.php
# $temp = $_SERVER['SCRIPT_FILENAME']; // R-Ouput: /var/www/alecory/Spring-2014/CIT-31300/Assignment 3/MVC-Pro/index.php
# $temp = $_SERVER['PATH_INFO']; // Nada.. Zilch
# $temp = $_SERVER['ORIG_PATH_INFO']; // Nada.. Zilch
# $temp = phpinfo();
# $temp = getcwd(); // R-Output: /home/alecory/Spring-2014/CIT-31300/Assignment 3/MVC-Pro
# $temp = $_SERVER['REQUEST_URI']; // R-Output: /alecory/Spring-2014/CIT-31300/Assignment%203/MVC-Pro/
# $temp = $_SERVER['PHP_SELF']; // R-Output: /alecory/Spring-2014/CIT-31300/Assignment 3/MVC-Pro/index.php
#
# var_dump($temp) . "\n\n";

# $paths= explode( '/', $temp );

# this has been so frustrating... I'm getting pretty pissed...
#
# Places Referenced:
# http://stackoverflow.com/questions/9879225/serverpath-info-on-localhost?rq=1
# http://stackoverflow.com/questions/17635596/i-do-not-have-path-info-in-server?rq=1
# http://stackoverflow.com/questions/2261951/what-exactly-is-path-info-in-php
# http://httpd.apache.org/docs/2.2/mod/core.html#acceptpathinfo
# http://goo.gl/L9vLle (GREAT RESOURCE)
#
// PATH_INFO isn't always set. It is only set if there was trailing path info after the script.
// For example if you have a file located here: localhost/index.php And you access it via this url: localhost/index.php/foo/bar
// then $_SERVER['PATH_INFO'] will be set to a value of "/foo/bar"
// but if you access the script via the url: localhost/index.php then PATH_INFO will not be set and you will see a notice like that for attempting to access an undefined index of an array
// -----------------------------------------------------------------------

// grab the path info and break it apart into separate variables
$paths= explode( '/', $_SERVER['PATH_INFO'] );


// ==================================================================
//
// DEBUG -- Depracated mysql_connect()     See (http://goo.gl/iB6RmL)
//
// ------------------------------------------------------------------


//check the view, if empty set to default view
if ($paths[1] == '') {

	$view = DEFAULT_VIEW;

} else {

	$view = $paths[1];
}

//check to see if a method is being called and assign the $method variable
$method = $paths[2];

//check to see if any parameters are passed and assign the $parameters array
for ( $i=3; $i < count($paths); $i++) {

	$parameters[] = $paths[$i];
}

//uppercase the first variable name and append Controller to it. If none, the default controller will load
$controller = ucfirst($view) . 'Controller';

//instantiate our controller and pass in parameters
if (class_exists($controller)) {

    new $controller($view, $method, $parameters);

} else {

	new Controller('404');
}