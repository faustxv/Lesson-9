<?php 
		class Controller_User extends Controller{

		public function __construct()
		{
			$this->model = new Model_login();
			$this->view = new View();
		}
		
		public function action_login()
		{
			$data = $this->model->log_in();		
			$this->view->generate('login_view.php', $data ,'Login');
		}
		public function action_logout()
		{
			$data = $this->model->log_out();
		}
		public function action_valid()
		{
			$data = $this->model->valid();
		}
	}
?>