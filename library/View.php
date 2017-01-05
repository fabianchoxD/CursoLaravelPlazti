<?php 

class View extends Response
{
	protected $template;
	protected $vars = array();

	function __construct($template, $vars = array())
	{
		$this->template = $template;
		$this->vars = $vars;
	}

	public function getTemplate()
	{
		return $this->template;
	}

	public function getVars()
	{
		return $this->vars;
	}


	public function execute()
	{
		$template  = $this->getTEmplate();
		$vars = $this->getVars();

		call_user_func(function() use($template, $vars) {

			extract($vars);

			ob_start();

			require "views/$template.tpl.php";

			$tpl_content = ob_get_clean();

			require "views/layout.tpl.php";

		});
	}
}