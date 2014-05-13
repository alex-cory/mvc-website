<?php

class MembersController extends Controller
{
	public $userObject;

	/**
	 * Description:
	 * Sets the key of 'post' in the Controller's $data array and pulls in the data from the database
	 * as the value, matching it with they key of 'post'
	 *
	 * @param  int    $uID [description]
	 * @return [type]      [description]
	 */
   	public function user($uID)
   	{
   		// instantiate the post class
		$this->userObject = new User();

		// this is pulling in the the data from the row in the database and storing it in $user
		$user = $this->userObject->getUser($uID);

		// die($user);

	  	// Sets the key of 'user' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'user'
	  	$this->set('user',$user);
   	}

	public function index()
	{
		$this->userObject = new User();
		$users = $this->userObject->getAllUsers($uID);

		$this->set('users', $users);

		$section = 'members';
	}

	public function profile()
	{
		$this->userObject = new User();
		$this->set('user', $this->userObject);
		$this->set('task','update');
		// d($user->email);

	}


	public function update()
	{
		$data = array(
			'first_name' => $_POST['first_name'],
			'last_name'  => $_POST['last_name'],
			'email'      => $_POST['email']
			// 'uID'        => $_POST['uID']
		);

		// Update user in session.
		$_SESSION['user'] = array_merge($_SESSION['user'], $data);

		$password = trim($_POST['profile_password']);
		$confirmpassword = trim($_POST['profile_confirmpassword']);

		if(!empty($password) and !empty($confirmpassword) && $password === $confirmpassword) {
	        $data['password'] = crypt($password);
		}

		$this->userObject = new User();
		$response = $this->userObject->updateUser($_POST['uID'], $data);

		$_SESSION['message'] = "Profile Updated!";
		header('Location: ' . BASE_URL . '/index.php/members/profile');
		exit();
	}


}