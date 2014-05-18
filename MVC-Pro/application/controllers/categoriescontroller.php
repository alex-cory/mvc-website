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

	/**
	 * Description:
	 * This just grabs an array of the categories and sets it to the $outcome variable.
	 *
	 * @return $outcome array of categories
	 */
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

	/**
	 * Description:
	 * This updates a category, sets a validation message, and then sets the categories array.
	 */
	public function update()
	{
		$catID = $_POST['categoryID'];
		$name = $_POST['categoryname'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->update($catID,$name);

		if($outcome){
			$this->set('message',"Category Updated");
		} else {
			$this->set('message',"Category update failed");
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}

	/**
	 * Description:
	 * This adds a new category, sets a validation message, and sets the categories.
	 */
	public function add()
	{
		$new = $_POST['newCategory'];
		$this->categoryObject = new Categories;
		$outcome = $this->categoryObject->addCategory($new);

		if(isset($outcome) and !empty($outcome)) {
			$this->set('message',"Category Added");
		} else {
			$this->set('message',"Oops, there was an error in your submission. Please try again");
		}
		$outcome = $this->categoryObject->getCategories();
		$this->set('categories',$outcome);
	}
}