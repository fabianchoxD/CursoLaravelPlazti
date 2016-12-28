<?php
	
	require 'config.php';
	require 'helpers.php';

	$private="Datos Privados";	
	$language="PHP";
	$titulo="SuperPHP";


	/*Llamar función PHP
	view('view', ['language' => $language, 'titulo' => $titulo]);*/

	//Llamar Funcion #2

	view('view', compact('language', 'titulo'));


