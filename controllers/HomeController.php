<?php 

class HomeController
{
	public function indexAction()
	{
		return new View('home' , ['titulo' => 'LaravelPHP']);
	}
}
	
/*	TODO ESTO SE VA A VOLVER UN OBJETO
	$private="Datos Privados";	
	$language="PHP";
	$titulo="SuperPHP";
*/

	/*Llamar función PHP
	view('view', ['language' => $language, 'titulo' => $titulo]);*/

	//Llamar Funcion #2

	//view('home', compact('language', 'titulo'));

 ?>