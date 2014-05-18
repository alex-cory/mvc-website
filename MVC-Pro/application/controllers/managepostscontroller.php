<?php

class ManagePostsController extends Controller
{
	public $postObject;
	public $categoryObject;
	protected $access = 1;

	public function index()
	{

   		// instantiate the post class
		$this->postObject = new Post();

		$posts = $this->postObject->getAllPosts();

		$this->set('title', 'Manage Posts');
		$this->set('posts', $posts);
	}

	/**
	 * Description:
	 * This adds a post.
	 */
	public function add()
	{

		$this->postObject = new Post();
		// $this->categoryObject = new Category();
		$this->set('task', 'save');
		// $categories = $this->categoryObject->getAllCategories();
		// $this->set('categories', $categories);
		// 		$data = array(
		// 				'title'      => $_POST['post_title'],
		// 				'content'    => $_POST['post_content'],
		// 				'date'       => $_POST['post_date'],
		// 				'categoryID' => $_POST['post_categoryID'],
		// 				'uID'        => !empty($u->uID) ? $u->uID : 0
		// 			 );

		// if(isset($_POST['category'])) {
		// 	$error = array();
		// 	$warn = "<div class='well'>Please make sure the following fields are not blank.<ul>";


		// foreach($data as $key => $value) {
		// 	if($key!=="uID") {

		// 		if(!isset($value) or trim($value)=="") {
		// 			$error[]=$key;
		// 		}
		// 	}
		// }

		// if(!empty($error)) {
		// 	foreach($error as $name) {
		// 		$warn.='<li>'.ucfirst($name).'</li>';
		// 	}
		// 	$warn .= "</ul></div>";
		// }
		// else{
		// 	$this->save($data);
		// 	$_SESSION['success'] = "Post Added.";
		// 	header("location:".BASE_URL."manageposts");
		// }

		// }

		// $this->postObject = new Post();
		// dd($this->getCategories());
		// $this->set('task', 'add');
		// $this->set('title', $data['title']);
		// $this->set('content', $data['content']);
		// $this->set('date',$data['date']);
		// $this->set('category',$data['category']);
		// // d($data['category']);

		// $this->set('message',$warn);
	}

	/**
	 * Description:
	 * This adds a post and sets a message for whether it was successful or not.
	 */
	public function save()
	{
		// if not adding a post
		if (empty($_POST)) {

			// then don't by leaving this function
			return;
		}

		$this->postObject = new Post();
		$u = new User();
		$data = array(
			'title'      => $_POST['post_title'],
			'content'    => $_POST['post_content'],
			'date'       => $_POST['post_date'],
			'categoryID' => $_POST['post_categoryID'],
			'uID'        => !empty($u->uID) ? $u->uID : 0 // This should actually never store 0, the user should always be logged in.
		);

		if (empty($data['date'])) {
			$data['date'] = date('Y-m-d H:i:s');
		}

		// safety precaution to make sure date is set
		$data['date'] = date('Y-m-d H:i:s', strtotime($data['date']));

		$result = $this->postObject->addPost($data);

		// Send the message to the manageposts home page
		// $_SESSION['message'] = (! empty($this->postObject->getMessage())) ? 'alert-success' : 0;

		$this->set('message', $result);
		header('Location: /index.php/manageposts/');
		exit;
	}

	/**
	 * Description:
	 * This basically allows the user to edit a post.
	 *
	 * @param  int    $pID [description]
	 * @return [type]      [description]
	 */
	public function edit($pID)
	{
		$this->postObject = new Post();
		$post = $this->postObject->getPost($pID);

		$this->set('pID', $post['pID']);
		$this->set('title', $post['title']);
		$this->set('content', $post['content']);
		$this->set('date', $post['date']);
		$this->set('categoryID', $post['categoryID']);
		$this->set('task', 'update');

	}

	/**
	 * Description:
	 * This updates the blog post.
	 *
	 * @return [type] [description]
	 */
	public function update()
	{
		$this->postObject = new Post();

		$post = array(
			'title'      => $_POST['post_title'],
			'content'    => $_POST['post_content'],
			'date'       => $_POST['post_date'],
			'categoryID' => $_POST['post_categoryID'],
			// 'pID'        => $_POST['post_uID']
        );

		if (empty($post['date'])) {
			$post['date'] = date('Y-m-d H:i:s');
		}

		// safety precaution to make sure date is set
		$post['date'] = date('Y-m-d H:i:s', strtotime($post['date']));

		$result = $this->postObject->updatePost($_POST['pID'], $post);

		// Send the message to the manageposts home page
		// $_SESSION['message'] = (! empty($this->postObject->getMessage())) ? 'alert-success' : 0;

		// $this->set('message', $result);
		header('Location: /index.php/manageposts/');
		// header('Location: /index.php/manageposts/edit/' . $_POST['pID']); // DEBUG: BASE_URL & remove index.php was /addPost/edit/
		exit;
	}

	/**
	 * Description:
	 * This basically deletes a post.
	 *
	 * @param  int    $pID [description]
	 * @return [type]      [description]
	 */
	public function delete($pID)
	{
		$this->postObject = new Post();

		$post = array(
			'title'      => $_POST['post_title'],
			'content'    => $_POST['post_content'],
			'date'       => $_POST['post_date'],
			'categoryID' => $_POST['post_categoryID'],
			'pID'        => $_POST['post_uID']
        );

		$result = $this->postObject->deletePost($pID, $post);

		// Send the message to the manageposts home page
		// $_SESSION['message'] = (! empty($this->postObject->getMessage())) ? 'alert-success' : 0;

		header('Location: /index.php/manageposts/'); // DEBUG: BASE_URL & remove index.php was /addPost/edit/
		exit;
	}

}
