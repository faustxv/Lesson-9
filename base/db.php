<?php 
	//Клас "Одинак" для підключення до БД
	class db{
		private static $conn;
		private function __construct() {}
		private function __clone()     {}
		private function __wakeup()    {}

		public static function connect_db(){
			if (self::$conn === NULL){
				//Змініть параметри входу для підключення до БД
				$db = array(
				  'db_name' => 'test',
				  'db_user' => 'root',
				  'db_pass' => '',
				);
				try {
				  $dsn = "mysql:host=localhost;dbname={$db['db_name']}";
				  self::$conn = new PDO($dsn, $db['db_user'], $db['db_pass']);
				  self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				  return self::$conn ;
				}
				catch(PDOException $e) {
				    print "DB ERROR: {$e->getMessage()}";
				}
			}
			else {
				return self::$conn;
			}
		}
	}
?>