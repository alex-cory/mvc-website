<?php
# constants
define('BASE_URL', ''); // MVC-Pro/views/elements/
define('DEFAULT_VIEW', 'home');//set this to any page to be the default home page

# database info
if ('localhost' == $_SERVER['HTTP_HOST']) { // Local
        define('DB_HOST', '');
        define('DB_USER', '');
        define('DB_PASS', '');
        define('DB_NAME', '');
} else { // Production
        define('DB_HOST', '');
        define('DB_USER', '');
        define('DB_PASS', '');
        define('DB_NAME', '');
}