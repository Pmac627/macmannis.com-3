<?php /* index.php */
error_reporting(E_ALL);

$site_path = realpath(dirname(__FILE__));
define('__SITE_PATH', $site_path);

include('control/engine/config.php');
include('control/engine/init_core.php');

$registry->relay = new relay($registry);
$registry->relay->set_path(__SITE_PATH . '/control');
$registry->template = new template($registry);
$registry->relay->loader();
?>