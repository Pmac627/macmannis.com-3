<?php /* init_core.php */
include(__SITE_PATH . '/control/engine/control_core.php');
include(__SITE_PATH . '/control/engine/registry_core.php');
include(__SITE_PATH . '/control/engine/relay_core.php');
include(__SITE_PATH . '/control/engine/template_core.php');

function __autoload($class) {
	$class_name = strtolower($class) . '.php';
	$class_include = __SITE_PATH . '/model/' . $class_name;

	if(file_exists($class_include) == FALSE) {
		return FALSE;
	} else {
		include($class_include);
	}
}

$registry = new registry;
$registry->db = db::DbOpen();
?>