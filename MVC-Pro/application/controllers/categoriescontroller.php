<?php

class CategoriesController extends Controller
{

	protected $categoryObject;
	protected $access = 1;

	public function index()
	{
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

	public function getCategories()
	{

		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategories();
	}

	public function edit($catID)
	{

		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->getCategory($catID);

		$this->set('category', $outcome);
	}

	public function update()
	{
		$catID = $_POST['categoryID'];
		$name = $_POST['categoryname'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->update($catID,$name);

		if($outcome){
			$this->set('message',"Category Updated");
		}
		else{
			$this->set('message',"Category update failed");
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

	public function add()
	{

		$new = $_POST['newCategory'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->addCategory($new);

		if(isset($outcome) and !empty($outcome)){
			$this->set('message',"Category Added");
		}
		else{
			$this->set('message',"Oops, there was an error in your submission. Please try again");
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);




	}






}