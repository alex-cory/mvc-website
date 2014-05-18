<?php

class LoginController extends Controller
{
    protected $userObject;

    /**
    * Description:
    * This logs in the user if the password is correct.  If not it spits out the error message.
    *
    * @return [type] [description]
    */
    public function do_login()
    {
        $this->userObject = new User();

        // grab the uID of the person signing in
        $uid = $this->userObject->checkUser($_POST['user_email'], $_POST['user_password']);

        // if the uID exists
        if ($uid) {

            $this->set('message', 'You logged in!');

            // grab the array of user-data from the database
            $user = $this->userObject->getUser($uid);

            // leave out the password
            unset($user['password']);
            unset($user[4]);

            // if (strlen($_SESSION['redirect']i) > 0) {  // basically, if someone types in the url with the funciton after,
            //    // supposed to redirect people to the pages they want.
            //    $view = $_SESSION['redirect'];
            //    unset($_SESSION['redirect']);
            //    header('Location: ' . BASE_URL . $view);

            // make the SESSION  key 'user' and set it equal to the aray of user-data
            $_SESSION['user'] = $user;

            header('Location: /index.php/');

        } else {

            $this->set('error', 'Sorry! Looks like something might be messed up with your Username or Password! :p');
        }
    }

    public function index()
    {
      $this->set('task','do_login');
    }
}
