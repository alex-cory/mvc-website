<?php

# Models are going to be grabbing stuff from the database or putting stuff to the database

class Comment extends Model
{
	/**
	 * This will pull the data into the view from the record of whichever "commentID" is specified.
	 *
	 * @param  int   $commentID   the primary key of the record being pulled
	 * @return array $comment  holds all the data from the record in $post
	 */
	function getComment($commentID)
	{
		$sql = 'SELECT commentID, uID, commentText, date, postID
				FROM   comments
				WHERE commentID = ?';
				// WHERE  pID = ? AND categoryID = ? AND date = ? AND uID = ?';
		//  ?   is going to define whatever we pass to it

		// perform query
		//$results = $this->db->getrow($sql, array($pID, $p));
		$results = $this->db->getrow($sql, array($commentID));

		$comment = $results;

		return $comment;
	}

	function getCommentsByPostID($postID)
	{
		$sql = 'SELECT commentID, uID, commentText, date
				FROM   comments
				WHERE postID = ?';
				// WHERE  pID = ? AND categoryID = ? AND date = ? AND uID = ?';
		//  ?   is going to define whatever we pass to it

		// perform query
		//$results = $this->db->getrow($sql, array($pID, $p));
		$results = $this->db->execute($sql, $postID);
		// d($results);

		while ($row = $results->fetchrow()) {

			$comments[] = $row;
		}

		return $comments;
	}

	/**
	 * Description:
	 * This will return an array of all the comments. Accessible from within the $comments array.
	 *
	 * @param  integer $limit the number of comments
	 * @return array   $comments this holds all the comments
	 */
	public function getAllComments($limit = 0)
	{
		if ($limit > 0) {

			// This will be used in the mySQL statement below
			$numcomments = ' LIMIT ' . $limit;
		}

		$sql = 'SELECT commentID, uID, commentText, date, postID
				FROM   comments'/*
				LIMIT */ . $numcomments;

		// perform query
		$results = $this->db->execute($sql);
		// d($results);

		while ($row = $results->fetchrow()) {

			$comments[] = $row;
		}

		return $comments;
	}

	/**
	 * Description:
	 * This is used to put data into the database.
	 *
	 * @param  array  $data    [description]
	 * @return string $message
	 */
	public function addComment($data)
	{
		$sql = '
			INSERT INTO comments (' . implode(', ', array_keys($data)) . ')
			VALUES (' . rtrim(str_repeat('?, ', count($data)), ', ') . ')';
		//$sql='INSERT INTO comments (title, content, categoryID, date, uID)
		//	  VALUES (?,?)';
		// var_dump($sql);
		// die('here');


		$result = $this->db->execute($sql, $data);

		// d($sql, $data, $result);

		$message = 'Comment added.';

		return $message;
	}

	/**
	 * Description:
	 * This is used to update data a post in the database.
	 *
	 * @param [type] $data [description]
	 * @return       $message
	 */
	public function updateComment($commentID, $data)
	{
		$sql = 'UPDATE comments SET ';
		// adding the columns to update the query
		foreach ($data as $k => $v) {
			$sql .= $k . ' = ?, ';
		}
		// remove the extra ,
		$sql = rtrim($sql, ', ');
		$sql .= ' WHERE commentID = ?';

		$data = array_merge($data, array($commentID));
		//var_dump($sql); die();

		$this->db->execute($sql, $data);

		$message = 'Comment added.';

		return $message;
	}

	public function deleteComment($commentID)
	{
		$sql = 'DELETE FROM comments WHERE commentID = ?';

		$this->db->execute($sql, array($commentID));

	}

}