<?php

# Models are going to be grabbing stuff from the database or putting stuff to the database

/**
 * Description:
 *
 */
class User extends Model
{
	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	public $active = 0;
	protected $type;

        public function __construct()
        {
            parent::__construct();

            if (isset($_SESSION['user'])) {

                $user = $_SESSION['user'];

                $this->uID = $user['uID'];
                $this->first_name = $user['first_name'];
                $this->last_name = $user['last_name'];
                $this->email = $user['email'];
                $this->type = $user['user_type'];
                $this->active = $user['active'];
            }
        }
	/**
	 * Description:
	 * This is used to put the data about the User into the database.
	 *
	 * @param  $data      ie: first name, last name, email, etc..
	 * @return $message   if successful, will return "User added."
	 */
	public function addUser($data)
	{
		$sql = '
			INSERT INTO users (' . implode(', ', array_keys($data)) . ')
			VALUES (' . rtrim(str_repeat('?, ', count($data)), ', ') . ')';

			// die($sql);

		# --- Above is the same as below ---
		//$sql='INSERT INTO users (first_name, last_name, email, password, user_type)
		//	    VALUES (?, ?, ?, ?, ?)';

		$this->db->execute($sql, $data);

		$message = 'You are now registered! Please login! :)';

		return $message;
	}

	/**
	 * Description:
	 * This is used to verify the user signing in's hashed password once signed in matches the hashed password in the database.
	 *
	 * @param  $email
	 * @param  $password
	 * @return
	 */
    public function checkUser($email, $password)
    {
        $sql = "SELECT uID, email, password
        		FROM users
                WHERE email = ? AND active = 1
                LIMIT 1";

        // perform query // VIM SAYS SOMETHING WRONG WITH LINE BELOW DEBUG
        $results = $this->db->getrow($sql, array($email));

        // d($results);
        // d($password);
        // d($email);

        // if it matches the passwords match, this will return TRUE otherwise it will return FALSE
        return crypt($password, $results['password']) == $results['password'] ? $results['uID'] : FALSE;
    }

	/**
	 * This will pull the data into the view from the record of whichever "userID" is specified.
	 *
	 * @param  int   $uID   the primary key of the record being pulled
	 * @return array $user  holds all the data from the record in $user
	 */
	function getUser($uid)
	{
		$sql = 'SELECT *
				FROM   users
				WHERE uID = ?';
		//  ?   is going to define whatever we pass to it

		// perform query
		$results = $this->db->getrow($sql, array($uid));

		$user = $results;

		return $user;
	}

	/**
	 * Description:
	 * Checks to see if the user_type is Admin.
	 *
	 * @return boolean
	 */
	public function isAdmin()
	{
		// return the value of the condition
		// is 1 equal to this type?
		return isset($this->type) && 1 == $this->type;
	}

	public function isActive()
	{
		// return the value of the condition
		// is 1 equal to this type?
		return !empty($this->active);
	}

	/**
	 * Description:
	 * Checks to see if the current user (based off of the session I believe) is
	 * indeed a registered user
	 *
	 * @return boolean
	 */
	public function isRegistered()
	{
		return isset($this->uID);
	}

	/**
	 * Description:
	 * Returns the Type of User the user is.
	 *
	 * @return user_type (I'm pretty sure this is just the difference between Admin and Registered User)
	 */
    public function getUserType()
    {
        return $this->type;
    }

    /**
     * Description:
     * Returns the name of the current user.
     *
     * @return string   the first and last name of the person
     */
    public function getUserName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Description:
     * Returns the value of the user's email address.
     *
     * @return string    email address
     */
    public function getUserEmail()
    {
        return $this->email;
    }

	/**
	 * Description:
	 * This will return an array of all the posts. Accessible from within the $posts array.
	 *
	 * @param  integer $limit the number of posts
	 * @return array   $posts this holds all the posts
	 */
	public function getAllUsers($limit = 0)
	{
		if ($limit > 0) {

			// This will be used in the mySQL statement below
			$numposts = ' LIMIT ' . $limit;
		}

		$sql = 'SELECT uID, first_name, last_name, email, password, active, user_type
				FROM users'/*
				LIMIT */ . $numposts;

		// perform query
		$results = $this->db->execute($sql);

		while ($row = $results->fetchrow()) {

			$users[] = $row;
		}

		return $users;
	}

	/**
	 * Description:
	 * This is used to update data a user in the database.
	 *
	 * @param [type] $data    [description]
	 * @return       $message
	 */
	public function updateUser($uID, $data)
	{
		# SQL statement
		$sql = 'UPDATE users SET ';
		// adding the columns to update the query
		foreach ($data as $k => $v) {
			$sql .= $k . ' = ?, ';
		}

		// remove the extra ,
		$sql = rtrim($sql, ', ');
		$sql .= ' WHERE uID = ?';

		$data = array_merge(array_values($data), array($uID));

		$this->db->execute($sql, $data);

		$message = 'User updated.';

		return $message;
	}


	public function deleteUser($uID)
	{
		$sql = 'DELETE FROM users WHERE uID = ?';
		$this->db->execute($sql, array($uID));
		return 'User has been deleted.';
	}
}
