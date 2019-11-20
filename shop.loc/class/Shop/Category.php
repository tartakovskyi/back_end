<?php 

namespace Shop;

class Category {

	private $ID;
	private $catInfo = [];
	private $parents = [];


	public function __construct($id) {

		$this->ID = $id;

	}

	public function getCategoryInfo() {

		$stmt = DB::$conn->prepare("SELECT * FROM categories WHERE categoryID = :id");
		$stmt->execute(['id' => $this->ID]);

		$this->catInfo = $stmt->fetch(\PDO::FETCH_ASSOC);
		
		return $this->catInfo;
		
	}

	public function getParents() {

		$parentID = $this->catInfo['parent'];

		while ($parentID !== null) {
			$stmt = DB::$conn->prepare("SELECT * FROM categories WHERE categoryID = :id");
			$stmt->execute(['id' => $parentID]);

			$parentInfo = $stmt->fetch(\PDO::FETCH_ASSOC);

			$this->parents[] = $parentInfo;

			echo $parentInfo['categoryID'];

			$parentID = $parentInfo['categoryID'];
		}
		return $this->parents;
	}





	




}

?>