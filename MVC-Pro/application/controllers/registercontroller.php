<?php

	class RegisterController extends Controller
	{
		protected $userObject;

		public function index()
		{
			$userObject=new User();
			$this->set('task','add');
		}

		public function add()
		{
			$data = array(
							'first_name' => $_POST['first_name'],
							'last_name'  => $_POST['last_name'],
							'email'      => $_POST['email'],
							'password'   => crypt($_POST['password']),
							'active'     => 0
						  );
			$this->userObject = new User();
			$this->userObject->addUser($data);
			$this->set('message','Thanks for registering!');
			$this->set('task','add');
		}

		public function view($userID)
		{
			$this->userObject = new User();
			$response = $this->userObject->view($userID);
			$this->set('first_name',$response['first_name']);
			$this->set('last_name',$response['last_name']);
			$this->set('email',$response['email']);
			$this->set('uID',$response['uID']);
			$this->set('password', $response['password']);
			$this->set('task','update');
		}

		public function update()
		{
			$data = array('first_name' => $_POST['first_name'], 'last_name'=> $_POST['last_name'],'email'=>$_POST['email'],'password'=>md5(sha1($_POST['password'])), 'uID'=>$_POST['uID']);

			$this->userObject = new User();
			$response = $this->userObject->update($data);
			$this->set('first_name',$data['first_name']);
			$this->set('last_name',$data['last_name']);
			$this->set('email',$data['email']);
			$this->set('uID',$data['uID']);
			$this->set('password', $data['password']);
			$this->set('message', $response);
			$this->set('task','update');
		}
	}
