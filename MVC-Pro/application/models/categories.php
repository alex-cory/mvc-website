<?php
	class Categories extends Model
	{

		function getCategories()
		{
			$sql = 'SELECT categoryID,name from categories';
			$categories2 = array();

			// perform query
			$results = $this->db->execute($sql);

			while ($row=$results->fetchrow()) {
				$categories[] = $row;
			}

			foreach($categories as $array) {

				$categories2[$array['categoryID']]= $array['name'];
			}

			$categories= $categories2;

			return $categories;
		}

		public function getCategory($catID)
		{
			$sql = 'SELECT categoryID, name FROM categories WHERE categoryID=?';
			$outcome = $this->db->getrow($sql,array($catID));

			return $outcome;
		}

		public function update($catID,$name)
		{
			$categoryID = $this->db->qstr($catID);
			$categoryName = $this->db->qstr($name);

			$sql = "UPDATE categories SET name=$categoryName WHERE categoryID = $categoryID";
			$results = $this->db->execute($sql);

			return $results;
		}

		public function addCategory($newCategory)
		{
			$sql = "INSERT INTO categories (name) VALUES (?)";
			$outcome = $this->db->execute($sql, $newCategory);

			return $outcome;
		}
	}

 ?>