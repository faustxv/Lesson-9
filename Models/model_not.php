<?php 
	class Model_Not  extends Model{
	
		public function not404(){	
			return array(
			  'name' => '404 Not Found',
			  'img' => '/images/404.png',
			);
		}
		public function not403(){	
			return array(
			  'name' => '403 Forbidden',
			  'img' => '/images/403.png',
			);
		}
	}
?>