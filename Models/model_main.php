<?php 
//Модель для головної сторінки
	class Model_Main  extends Model{
	
		public function get_data(){	
			$conn = db::connect_db();
			$stmt = $conn->prepare('SELECT id, title, short_desc, timestamp FROM content ORDER BY timestamp DESC LIMIT 0,10');
	  		$stmt->execute();
	  		$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return ($articles);
		}
	}
?>