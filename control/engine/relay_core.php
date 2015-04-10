<?php /* relay_core.php */

class relay {
	private $registry;
	private $path;
	private $args = array();
	public $file;
	public $control;
	public $action;

	function __construct($registry) {
		$this->registry = $registry;
	}

	function set_path($path) {
		if(is_dir($path) == FALSE) {
			throw new Exception('Control path does not exist: ' . $path);
		}

		$this->path = $path;
	}

	public function loader() {
		$this->get_control();

		if(is_readable($this->file) == FALSE) {
			$this->control = 'error';
			$this->file = $this->path . '/' . $this->control . '.php';
		}

		include($this->file);

		$class = $this->control . '_ctrl';
		$control = new $class($this->registry);

		if(is_callable(array($control, $this->action)) == FALSE) {
			$action = 'index';
		} else {
			$action = $this->action;
		}

		$control->$action();
	}

	private function get_control() {
		$relay = (empty($_GET['p'])) ? '' : $_GET['p'];

		if(empty($relay)) {
			$relay = 'home';
		} else {
			$link_fragments = explode('/', $relay);
			$this->control = str_replace('-', '_', $link_fragments[0]);

			if(isset($link_fragments[1])) {
				$this->action = str_replace('-', '_', $link_fragments[1]);
			}
		}

		if(empty($this->control)) {
			$this->control = 'home';
		}

		if(empty($this->action)) {
			$this->action = 'index';
		}

		$this->file = $this->path . '/' . $this->control . '.php';
	}
}
?>