<?php

class LogoutController extends Controller
{
   public function index()
   {
   	session_destroy(); // deletes session
   	header('Location: /');
   	exit();
   }
}
