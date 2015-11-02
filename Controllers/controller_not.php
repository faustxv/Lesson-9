<?php 
	class Controller_not extends Controller
	{
		function __construct()
		{
			$this->view = new View();
			$this->model = new Model_Not();
		}
		function action_403()
		{
			$data = $this->model->not403();
			$this->view->generate('not_view.php', $data);
		}
		function action_404()
		{
			$data = $this->model->not404();
			$this->view->generate('not_view.php', $data);
			print_r($data);
		}

	}
?>