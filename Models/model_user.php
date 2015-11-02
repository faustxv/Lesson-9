<?php 
	class Model_Login  extends Model{
		// Логін, з яким можна зайти на сайт.
		public $name = 'admin';
		// пароль "123", але ми його не зберігаємо у відкритому вигляді, ми вписуємо тільки хеш md5.
		public $pass = '202cb962ac59075b964b07152d234b70';
	
		public function log_in(){	
			return array(
			  'name' => $this->name,
			  'pass' => $this->pass
			);
		}
		public function log_out(){	
			session_start();
			session_destroy();
			// Направляємо користувача на головну сторінку.
			header('Location: /');
		}
		public function valid(){
			if (!empty($_POST['name']) && !empty($_POST['pass'])) {

			  // Якщо доступи вірні, тоді робимо відповідний запис у сесії.
				if ($_POST['name'] == $this->name && md5($_POST['pass']) == $this->pass) {
			   		 $_SESSION['login'] = TRUE;
				    // Направляємо користувача на головну сторінку.
				    header('Location:/');
			 	}else {
			    	header('location:/#error');
			  	}

			}
			else Route::ErrorPage404();
		}
	}
?>