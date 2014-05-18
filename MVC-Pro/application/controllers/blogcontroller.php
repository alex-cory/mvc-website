<?php

class BlogController extends Controller
{
	public $postObject;
	public $commentObject;
	public $userObject;

	/**
	 * Description:
	 * Sets the key of 'post' in the Controller's $data array and pulls in the data from the database
	 * as the value, matching it with they key of 'post'
	 *
	 * @param  int 	  $pID  the ID of the post
	 * @return object $post contains all the data from the post
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
		// $post['date'] = date('F jS', strtotime($post['date']));

	  	// Sets the key of 'post' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'post'
	  	$this->set('post', $post);
   	}

	/**
	 * Description:
	 * This
	 *
	 * @param  int    $categoryID [description]
	 * @return [type]      		  [description]
	 */
   	public function category($categoryID)
   	{
   		// instantiate the Category class
		$this->categoryObject = new Category();

   		// instantiate the Post class
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

   		// Delete comments if the Delete Button is pressed
   		if ($u->isAdmin() && !empty($_POST['action']) && 'Delete' == $_POST['action']) {
   			$this->commentObject->deleteComment($_POST['commentID']);
   		}
   		$this->set('comments', $this->commentObject->getCommentsByPostID($pID));

		// this is pulling in the the data from the row in the database and storing it in $post
		$post = $this->postObject->getPost($pID);

		// changing date format
		// $post['date'] = date('F jS', strtotime($post['date']));

	  	// Sets the key of 'post' in the Controller's $data array and pulls in the data from the database as the value, matching it with they key of 'post'
	  	$this->set('post', $post);
   	}

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
	 * @param  int    $commentID [description]
	 * @return object $comment 	 [description]
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
