<?php

use \Core\BaseController;

class Test extends BaseController
{

	var $config, $menu;
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function index()
	{
	    var_dump(pathinfo('index.php', PATHINFO_EXTENSION));
	}
}
?>
