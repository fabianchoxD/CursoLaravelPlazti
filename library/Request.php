<?php 

class Request 
{
	//Caracteristicas por lo gral son tipo Protected.
	protected $url;
	protected $controller;
	protected $defaultController = 'home';
	protected $action;
	protected $defaultAction = 'index';
	protected $params = array();

	//Métodos Por lo general son tipo Público.
	public function __construct($url)
	{
		$this->url = $url;

		//team/about/fabian
		//team/about/stevens
		//team

		$segments = explode('/', $this->getUrl());
		//Prueba var_dump($segments);
		//Prueba exit();

		$this->resolveController($segments);
		$this->resolveAction($segments);
		$this->resolveParams($segments);
	}

	public function resolveController(&$segments)
	{
		//& es para que se pase por referencia, no por valor
		/*al pasar por referencia se "modifica" el archivo original
		al pasar por valor se crea una "copia" del archivo y esa se pasa... se conserva el original*/

		$this->controller = array_shift($segments);

		if(empty($this->controller))
		{
			$this->controller  = $this->defaultController;
		}
	}

	public function resolveAction(&$segments)
	{
		//& es para que se pase por referencia, no por valor
		/*al pasar por referencia se "modifica" el archivo original
		al pasar por valor se crea una "copia" del archivo y esa se pasa... se conserva el original*/

		$this->action = array_shift($segments);

		if(empty($this->action))
		{
			$this->action  = $this->defaultAction;
		}
	}

	public function resolveParams(&$segments)
	{
		$this->params = $segments;
	}

	public function getUrl()
	{
		return $this->url;
	}

	public function getController()
	{
		return $this->controller;
	}

	public function getControllerClassName()
	{
		return Inflector::camel($this->getController()) . 'Controller';
	}

	public function getControllerFileName()
	{
		return 'controllers/' . $this->getControllerClassName() . '.php';
	}

	public function getAction()
	{
		return $this->action;
	}

	public function getActionMethodName()
	{
		return Inflector::lowerCamel($this->getAction()) . 'Action';
	}

	public function getParams()
	{
		return $this->params;
	}

	public function execute()
	{
		$controllerClassName	= $this->getControllerClassName();
		$controllerFileName 	= $this->getControllerFileName();
		$actionMethodName 		= $this->getActionMethodName();
		$params 				= $this->getParams();

		if ( ! file_exists($controllerFileName))
		{
			exit('Controlador no Existe');
		}

		require $controllerFileName;

		$controller = new $controllerClassName();

		$response = call_user_func_array([$controller, $actionMethodName], $params);

		$this-> executeResponse($response);
	}

	public function executeResponse($response)
	{		
		if($response instanceof Response)
		{
			$response->execute();
		}
		elseif(is_string($response))
		{
			echo $response;
		}
		elseif (is_array($response)) 
		{
			echo json_encode($response);
		}
		else
		{
			exit('Respuesta no Válida');
		}
	}

}

//Metodos con Minuscula 
//Clases con Mayuscula 