<?php
	/*session_start();

	echo "<pre>";
	print_r($_SESSION);
	echo "<pre>";

	unset($_SESSION['x']); //exclui indice se existir

	echo "<pre>";
	print_r($_SESSION);
	echo "<pre>";
//destroi a variavel de sessao
	session_destroy();

	session_start();
	echo "<pre>";
	print_r($_SESSION);
	echo "<pre>";*/
	session_destroy();
	header('location: index.php')
?>