<?php 
	session_start();
	//abertura de arquivo
	$arquivo = fopen('arquivo.hd','a');

	$titulo = str_replace('#', '-', $_POST['t']);
	$categoria = str_replace('#', '-', $_POST['c']);
	$descricao = str_replace('#', '-', $_POST['d']);

	$texto = $_SESSION['id'] . '-' .$titulo. '-' . $categoria. '-' . $descricao . PHP_EOL ;
	echo "$texto";
	
	//codigo não funciona por causa do metodo post no formulario html
	
    //juntando os array em conjunto de strings
	//implode('#', '$_POST');
	//escrita do texto
	fwrite($arquivo, $texto);
	//fechamento do texto
	fclose($arquivo);

	header('location: call.php');
?>