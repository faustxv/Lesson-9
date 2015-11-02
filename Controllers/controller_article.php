<?php 
//Дочірній клас контролера що відповадає за матеріали на сайті
	class Controller_Article extends Controller{

		function __construct()
		{
			$this->model = new Model_Article();
			$this->view = new View();
		}
		//метод для перегляду статті
		function action_index()
		{
			if (!empty($_GET['id'])){
				$data = $this->model->get_data();		
				$this->view->generate('article_view.php', $data ,'Article');
			} else Route::ErrorPage404();
		}
		//метод для рудагування статті
		function action_edit()
		{	
			//первірка авторизації
			if(!($_SESSION['login'])) {
				Route::ErrorPage403();
				exit();
			}
			if (!empty($_GET['id'])){
				$data = $this->model->get_data();		
				$this->view->generate('edit_view.php', $data ,'Edit');
			} else Route::ErrorPage404(); 
			if (isset($_POST['edit'])){
				$this->model->edit_article();
			}
		}
		//метод для видалення статті
		function action_delete()
		{	
			//первірка авторизації
			if(!($_SESSION['login'])) {
				Route::ErrorPage403();
				exit();
			}
			if (!empty($_GET['id'])){
				$data = $this->model->get_data();		
				$this->view->generate('delete_view.php', $data ,'Delete');
			} else Route::ErrorPage404();
			if (isset($_POST['del'])) {
				$this->model->Delete_article();
			}	
		}
		//метод для створення статті
		function action_create()
		{
			//первірка авторизації
			if(!($_SESSION['login'])) {
				Route::ErrorPage403();
				exit();
			}

			if (isset($_POST['create'])){
				$this->model->Create_article();
			}	
			$this->view->generate('create_view.php', '' ,'Create Post');	
		}
	}
?>