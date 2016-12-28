<?php 

	/*
	El Frontend controller se encarga de configurar
	la Aplicación
	*/
	
	require 'config.php';
	require 'helpers.php';

	//Llama al controlador indicado
/*
	if (empty($_GET['url'])) 
	{
		$_GET['url'] = 'home'; 
	}

*/

//Library

	require 'library/Request.php';
	require 'library/Inflector.php';

// Llamar al controlador indicado

	if(empty($_GET['url']))
	{
		$url = "";
	}
	else
	{
		$url = $_GET['url'];
	}

//Instanciar la clase Recien declarada

	$request = new Request($url);

	var_dump($request->getActionMethodName());

//	controller($_GET['url']);
	
/* todo esto se reemplaza por el controller...

	//Llamar a los controladores Individuales
	//Index.php
	if (empty($_GET['url'])) 
	{
		require "controllers/home.php"; 
	}
	//index.php?url=contactos
	elseif ($_GET['url'] == 'contactos') 
	{
		require "controllers/contactos.php"; 
	}
	//index.php?url=asdasda otra pagina q no exista...
	else
	{
		header("HTTP/1.0 404 Not Found");
		exit("Página no encontrada");
	}
*/