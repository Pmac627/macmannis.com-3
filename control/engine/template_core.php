<?php /* template_core.php */

class template {
	private $registry;
	private $vars = array();

	function __construct($registry) {
		$this->registry = $registry;
	}

	public function __set($index, $value) {
		$this->vars[$index] = $value;
	}

	function show($name) {
		$path = __SITE_PATH . '/view/' . $name . '.php';

		if(file_exists($path) == FALSE) {
			throw new Exception('Template does not exist: ' . $path);
			return FALSE;
		}

		foreach($this->vars as $key => $value) {
			$$key = $value;
		}

		include($path);
	}
}
?>