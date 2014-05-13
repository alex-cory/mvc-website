<?php

# Models are going to be grabbing stuff from the database or putting stuff to the database

class Post extends Model
{
	public $message = "I guess it didn't work :( Sowwy!";

	/**
	 * This will pull the data into the view from the record of whichever "postID" is specified.
	 *
	 * @param  int   $pID   the primary key of the record being pulled
	 * @return array $post  holds all the data from the record in $post
	 */
	function getPost($pID)
	{
		$sql = 'SELECT pID, title, content, categoryID, date, uID
				FROM   posts
				WHERE pID = ?';
				// WHERE  pID = ? AND categoryID = ? AND date = ? AND uID = ?';
		//  ?   is going to define whatever we pass to it

		// perform query
		//$results = $this->db->getrow($sql, array($pID, $p));
		$results = $this->db->getrow($sql, array($pID));

		// $this->message = (! empty($results)) ? "Successfully got the post! :)" : "Sowwy! Couldn't find the post. :(";
		$post = $results;

		return $post;
	}

	/**
	 * Description:
	 * This will return an array of all the posts. Accessible from within the $posts array.
	 *
	 * @param  integer $limit the number of posts
	 * @return array   $posts this holds all the posts
	 */
	public function getAllPosts($limit = 0)
	{
		if ($limit > 0) {

			// This will be used in the mySQL statement below
			$numposts = ' LIMIT ' . $limit;
		}

		$sql = 'SELECT pID, title, content, categoryID, date, uID
				FROM posts'/*
				LIMIT */ . $numposts;

		// perform query
		$results = $this->db->execute($sql);
		// d($results);

		while ($row = $results->fetchrow()) {
			$posts[] = $row;
		}

		for ($i=0; $i<=count($row); $i++) {
			$posts[$i]['date'] = date('F jS', strtotime($posts[$i]['date']));
		}

		return $posts;
	}

	/**
	 * Description:
	 * This is used to put data into the database.
	 *
	 * @param  array  $data    [description]
	 * @return string $message
	 */
	public function addPost($data)
	{
		$sql = '
			INSERT INTO posts (' . implode(', ', array_keys($data)) . ')
			VALUES (' . rtrim(str_repeat('?, ', count($data)), ', ') . ')';
		//$sql='INSERT INTO posts (title, content, categoryID, date, uID)
		//	  VALUES (?,?)';
		// var_dump($sql);
		// die('here');


		$result = $this->db->execute($sql, $data);

		// d($sql, $data, $result);
		// $this->message = (! empty($result)) ? "Post successfully added! :)" : "Sowwy! Couldn't post your post to the DB. :(";

		$message = 'Post added.';

		return $message;
	}

	/**
	 * Description: getMessage
	 * Returns a message of whether the function was successful or not.
	 *
	 * @return string the value of the message returned
	 */
	public function getMessage()
	{
		return $this->message;
	}

	/**
	 * Description:
	 * This is used to update data a post in the database.
	 *
	 * @param [type] $data [description]
	 * @return       $message
	 */
	public function updatePost($pID, $data)
	{
		$sql = 'UPDATE posts SET ';
		// adding the columns to update the query
		foreach ($data as $k => $v) {
			$sql .= $k . ' = ?, ';
		}
		// remove the extra ,
		$sql = rtrim($sql, ', ');
		$sql .= ' WHERE pID = ?';

		$data = array_merge($data, array($pID));
		//var_dump($sql); die();

		$this->db->execute($sql, $data);
		// $this->message = (! empty($data)) ? 'Update successfully updated! :)' : 0;

		$message = 'Post added.';

		return $message;
	}

	public function deletePost($pID)
	{
		$sql = 'DELETE FROM posts WHERE pID = ?';

		$this->db->execute($sql, array($pID));
	}

}