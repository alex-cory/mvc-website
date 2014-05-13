<?php

class BlogController extends Controller
{
	public $postObject;
	public $commentObject;
	public $userObject;

	// public function __construct()
	// {
	// 	parent::__construct();
	// }

	/**
	 * Description:
	 * Sets the key of 'post' in the Controller's $data array and pulls in the data from the database
	 * as the value, matching it with they key of 'post'
	 *
	 * @param  [type] $pID [description]
	 * @return [type]      [description]
	 */
   	public function post($pID)
   	{
   		// instantiate the comment class
		$this->commentObject = new Comment();

   		// instantiate the post class
		$this->postObject = new Post();

		// If the user is submitting a comment.
   		if (!empty($_POST['action']) && 'Add Comment' == $_POST['action']) {
   			$data = array(
					'uID'         => $_POST['uID'],
					'postID'      => $_POST['postID'],
					'commentText' => $_POST['commentText']
			);
   			$message = $this->commentObject->addComment($data);
   		}

   		$u = new User();
   		// Delete comments
   		if ($u->isAdmin() && !empty($_POST['action']) && 'Delete' == $_POST['action']) {
   			$this->commentObject->deleteComment($_POST['commentID']);
   		}

   		$this->set('comments', $this->commentObject->getCommentsByPostID($pID));
   		// $this->set('user', $this->commentObject->getUser())


		// this is pulling in the the data from the row in the database and storing it in $post
		$post = $this->postObject->getPost($pID);

		// changing date format
		$post['date'] = date('F jS', strtotime($post['date']));

	  	// Sets the key of 'post' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'post'
	  	$this->set('post', $post);
   	}

	/**
	 * Description:
	 *
	 * @param  [type] $pID [description]
	 * @return [type]      [description]
	 */
   	public function category($categoryID)
   	{
   		// instantiate the Category class
		$this->categoryObject = new Category();

   		// instantiate the post class
		$this->postObject = new Post();

		// If the user is submitting a Category.
   		if (!empty($_POST['action']) && 'Add Category' == $_POST['action']) {
   			$data = array(
					'uID'         => $_POST['uID'],
					'postID'      => $_POST['postID'],
					'commentText' => $_POST['commentText']
			);
   			$message = $this->commentObject->addComment($data);
   		}

   		$u = new User();
   		// Delete comments
   		if ($u->isAdmin() && !empty($_POST['action']) && 'Delete' == $_POST['action']) {
   			$this->commentObject->deleteComment($_POST['commentID']);
   		}

   		$this->set('comments', $this->commentObject->getCommentsByPostID($pID));
   		// $this->set('user', $this->commentObject->getUser())


		// this is pulling in the the data from the row in the database and storing it in $post
		$post = $this->postObject->getPost($pID);

		// changing date format
		$post['date'] = date('F jS', strtotime($post['date']));

	  	// Sets the key of 'post' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'post'
	  	$this->set('post', $post);
   	}

	/**
	 * Description:
	 *
	 *
	 * @return [type] [description]
	 */
	public function index()
	{
   		// instantiate the post class
		$this->postObject = new Post();

		$posts = $this->postObject->getAllPosts();

		$this->set('title', 'Blog');
		$this->set('posts', $posts);
	}

	/**
	 * Description:
	 * Sets the key of 'comment' in the Controller's $data array and pulls in the data from the database
	 * as the value, matching it with they key of 'comment'
	 *
	 * @param  [type] $commentID [description]
	 * @return [type]      		 [description]
	 */
   	public function comment($commentID)
   	{
   		// instantiate the comment class
		$this->commentObject = new Comment();

		// this is pulling in the the data from the row in the database and storing it in $comment
		$comment = $this->commentObject->getComment($commentID);

	  	// Sets the key of 'comment' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'comment'
	  	$this->set('comment', $comment);
   	}

}
