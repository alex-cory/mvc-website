<?php

class View
{
    function load($folder, $file_name, $data = array())
    {
   		// extract the data from the controller
    	if (is_array($data)) {

        	extract($data);
    	}

    	// instantiate our User class
    	$u = new User();

    	// show the view
    	include 'views/' . $folder . '/' . $file_name . '.php';
    }
}



