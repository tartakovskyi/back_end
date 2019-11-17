<?php 

namespace Shop;

class Category {

	private $ID;
	private $parents = [];


	public function __construct($id) {

		$this->ID = $id;

	}

	public function getCategoryInfo() {

		$stmt = DB::$conn->prepare("SELECT * FROM categories WHERE categoryID = :id");
		$stmt->execute(['id' => $this->ID]);
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
		
	}

	public function getParents($id) {

		$stmt = DB::$conn->prepare("SELECT parent FROM categories WHERE categoryID = :id");

		$stmt->execute(['id' => $id]);

		$parentID = $stmt->fetch(\PDO::FETCH_NUM)[0];

		if ($parentID === NULL) {

			return $this->parents;

		} else {

			$this->parents[] = $parentID;

			$this->getParents($parentID);

		}
	}




	




	




}

?>