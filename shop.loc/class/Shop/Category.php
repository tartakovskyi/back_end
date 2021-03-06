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

		$this->getParentsRecursion();

		return $this->parents;
		
	}



	private function getParentsRecursion($id = null) {

		if (is_null($id)) $id = $this->catInfo['parent'];

		$stmt = DB::$conn->prepare("SELECT categoryID,name,parent FROM categories WHERE categoryID = :id");
		$stmt->execute(['id' => $id]);

		$parentInfo = $stmt->fetch(\PDO::FETCH_ASSOC);

		$this->parents[] = $parentInfo;

		if (!is_null($parentInfo['parent'])) {
			$this->getParentsRecursion($parentInfo['parent']);
		} else {
			return;
		}

	}





	




}

?>