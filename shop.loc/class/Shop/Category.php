<?php 

namespace Shop;

class Category {

	private $ID;



	public function __construct($id) {

		$this->ID = $id;

	}

	public function getCategoryInfo() {

		$stmt = DB::$conn->prepare("SELECT * FROM categories WHERE categoryID = :id");
		$stmt->execute(['id' => $this->ID]);
		
		return $stmt->fetch(\PDO::FETCH_ASSOC);
		
	}

	/*$services = $db->super_query( "SELECT r.*, c.title as category_name, c.img as category_img, s.news_id, s.id as service_id, s.enabled, s.price, p.alt_name as post_alias, p.category as post_category, p.date as post_date, p.id as real_post_id, s.post_id FROM " . PREFIX . "_services as s LEFT JOIN " . PREFIX . "_services_ref as r ON (r.id = s.reference_id) LEFT JOIN " . PREFIX . "_service_categories_ref as c ON (c.id = r.category_ref_id) LEFT JOIN " . PREFIX . "_post as p ON (p.id = s.post_id) WHERE s.enabled=1 AND s.news_id=".(int)$news_id." ORDER BY c.sort, r.category_ref_id, r.title", true );*/

	




}

 ?>