<?php /* db.php */

class db {
	private static $instance = NULL;

	private function __construct() {}

	public static function DbOpen() {
		if(!self::$instance) {
			self::$instance = new PDO('mysql:host=' . __DB_HOST . ';dbname=' . __DB_NAME, __DB_USER, __DB_PWD);
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

		return self::$instance;
	}

	public function ValidateInput($string, $type, $length) {
		$type = 'is_'.$type;

		if(!$type($string)) {
			return FALSE;
		} elseif(empty($string)) {
			return FALSE;
		} elseif(strlen($string) > $length) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function ValidateEmail($email) {
		return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
	}

	private function __clone() {}
}
?>