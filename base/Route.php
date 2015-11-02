<?php 
//Класс роутер, призначений для підєднання контролера та модуля(необовязково) згідно запита користувача
	class Route{
		static function start()
		{
			// контролер та підя за замовчуванням
			$controller_name = 'Main';
			$action_name = 'index';
			// Розділяємо наше посилання на елементи розділені "/"
			// та записуємо їх в масив
			$routes = explode('/', $_SERVER['REQUEST_URI']);

			// отрмуємо ім'я контролера
			if ( !empty($routes[1]) )
			{	
				$controller_name = $routes[1];
			}
			
			// отрмуємо подію
			if ( !empty($routes[2]) )
			{
				$action_name = $routes[2];
			}

			// добавляємо перфікси
			$model_name = 'model_'.$controller_name;
			$controller_name = 'controller_'.$controller_name;
			$action_name = 'action_'.$action_name;

			// Підєднуємо файл модуля якщо він є

			$model_file = strtolower($model_name).'.php';
			$model_path = "Models/".$model_file;
			if(file_exists($model_path))
			{
				include "Models/".$model_file;
			}

			// Підєднуємо файл контролера , якщо він відсутній то 404
			$controller_file = strtolower($controller_name).'.php';
			$controller_path = "Controllers/".$controller_file;
			if(file_exists($controller_path))
			{
				include "Controllers/".$controller_file;
			}
			else
			{
				Route::ErrorPage404();
			}
			
			// Створюємо контролер
			$controller = new $controller_name;
			$action = $action_name;
			
			if(method_exists($controller, $action))
			{
				// викликаєм подію (метод)
				$controller->$action();
			}
			else
			{
				Route::ErrorPage404();
			}
		}
		//тут ніби пояснювати не потрібно=)
		static function ErrorPage404()
		{
		    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		    header('HTTP/1.1 404 Not Found');
			header("Status: 404 Not Found");
			header('Location:'.$host.'not/404');
	  	}
	  	static function ErrorPage403()
		{
		    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
		    header('HTTP/1.1 403 Forbidden');
			header("Status: 403 Forbidden");
			header('Location:'.$host.'not/403');
	  	}
	}
?>