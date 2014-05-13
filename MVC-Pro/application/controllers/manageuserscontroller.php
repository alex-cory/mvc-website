<?php

	class ManageUsersController extends Controller
	{

		protected $access = 1;
		public $user;

		public function index()
		{

			$this->user = new User();
			$outcome = $this->user->getAllUsers();
			$this->set('users',$outcome);
		}

		public function delete($uID)
		{
			$this->user = new User();
			$outcome = $this->user->deleteUser($uID);
			$outcome = $this->user->getAllUsers();
			$this->set('users',$outcome);

			if($outcome){
				$this->set('message', "User has been deleted.");
			}
		}

		public function approve($uID)
		{
			$this->user = new User();
			$data = array(
				'active' => 1
			);
			$outcome = $this->user->updateUser($uID, $data);
			// $outcome = $this->user->approve($uID);
			$outcome = $this->user->getAllUsers();
			$this->set('users',$outcome);

			if($outcome){
				$this->set('message', "User has been approved.");
			}
		}

	}