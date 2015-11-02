<?php 
	// Початок буферу.
	ob_start();
	// Початок або продовження сесії.
	session_start();
	//Підключення бази даних та батьківських класів
	require_once 'base/db.php';
	require_once 'base/model.php';
	require_once 'base/view.php';
	require_once 'base/controller.php';
	require_once 'base/Route.php';
	//Почати перенаправляти користувачів згідно посилань
	Route::start();
?>