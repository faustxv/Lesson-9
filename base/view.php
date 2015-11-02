<?php 
//Батьківський клас для Вюв
	class View
	{
			/*
			$content_file - сторінка яку потрібно відобразити;
			$data - дані що передаються з моделі, зазвичай це масив
			*/
		function generate($content_view, $data = null, $page_title = 'Blog site')
		{
			//підєднання шапки, основної сторінки та футера
			include ('/View/header.php');
			include ('/View/'.$content_view);
			include ('/View/footer.php');

		}
	}
?>