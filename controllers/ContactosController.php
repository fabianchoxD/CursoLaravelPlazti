<?php 
	
	class ContactosController
	{
		public function indexAction()
		{

		}

		public function ciudadAction($ciudad)
		{
			exit('contactos ' . $ciudad);
		}
	}
	//Esto se convertirá en un Objeto
	//view('contactos');
 ?>