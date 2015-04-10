<?php /* db_site.php */

class db_site extends db {
	public function GetSiteMeta($conn, $site_id = 1) {
		$sql = $conn->prepare("SELECT title, lang, charset, content_type, ga_code, base_url, admin, admin_email, open
								FROM site
								WHERE site_id = ?");
		$sql->bindParam(1, $site_id, PDO::PARAM_INT);
		$sql->execute();
		$site = null;
		foreach($sql->fetchAll() as $record) {
			$this->site = array(
				'title' => $record['title'],
				'lang' => $record['lang'],
				'charset' => $record['charset'],
				'content_type' => $record['content_type'],
				'ga_code' => $record['ga_code'],
				'base_url' => $record['base_url'],
				'admin' => $record['admin'],
				'admin_email' => $record['admin_email'],
				'open' => $record['open']
			);
		}
		return $this->site;
	}

	public function GetIPv4() {
		if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		} elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif(!empty($_SERVER['REMOTE_ADDR'])) {
			return $_SERVER['REMOTE_ADDR'];
		} else {
			return 'Unknown';
		}
	}

	public function FindVisitor($conn, $site_id = 1) {
		$ip = '';
		$ip = self::GetIPv4();

		$sql = $conn->prepare("SELECT visitor_id, total_visits, whitelisted
								FROM vwFindVisitor
								WHERE ip4 = ?
									AND site_id = ?");
		$sql->bindParam(1, $ip, PDO::PARAM_STR);
		$sql->bindParam(2, $site_id, PDO::PARAM_INT);
		$sql->execute();
		$visitor = array();

		$result = null;
		$result = $sql->fetchAll();

		if(count($result) == 1) {
			foreach($result as $record) {
				$visitor = array(
					'visitor_id' => $record['visitor_id'],
					'total' => $record['total_visits'],
					'whitelisted' => $record['whitelisted']
				);
			}
		}
		return $visitor;
	}

	protected function UpdateVisitor($conn, $total, $id, $site_id = 1) {
		$sql = $conn->prepare("UPDATE visitors SET total_visits = ? WHERE visitor_id = ? AND site_id = ?");
		$sql->bindParam(1, $total, PDO::PARAM_INT);
		$sql->bindParam(2, $id, PDO::PARAM_INT);
		$sql->bindParam(3, $site_id, PDO::PARAM_INT);
		$sql->execute();
	}

	protected function CreateVisitor($conn, $total, $site_id = 1) {
		$ip = '';
		$ip = self::GetIPv4();

		$sql = $conn->prepare("SELECT lookup_whitelist_ip_id
								FROM lookup_whitelist_ip
								WHERE ip4 = ?");
		$sql->bindParam(1, $ip, PDO::PARAM_STR);
		$sql->execute();

		$whitelisted = null;
		$whitelisted = $sql->fetchAll();
		if(count($whitelisted) == 0) {
			$sql2 = $conn->prepare("INSERT INTO visitors (site_id, ip4, total_visits) VALUES (?, ?, ?)");
			$sql2->bindParam(1, $site_id, PDO::PARAM_INT);
			$sql2->bindParam(2, $ip, PDO::PARAM_STR);
			$sql2->bindParam(3, $total, PDO::PARAM_INT);
			$sql2->execute();
		}
	}

	public function LogVisitor($conn, $site_id = 1) {
		if(!isset($_COOKIE[__COOKIE_VISITOR_NAME])) {
			$visitor = null;
			$visitor = self::FindVisitor($conn, $site_id);

			if($visitor != null && !empty($visitor)) {
				if($visitor['whitelisted'] == 0) {
					if($visitor['total'] > 0) {
						$visitor['total']++;
						self::UpdateVisitor($conn, $visitor['total'], $visitor['visitor_id'], $site_id);
					}

					setcookie(__COOKIE_VISITOR_NAME, __COOKIE_VISITOR_VALUE, __COOKIE_VISITOR_LENGTH);
				}
			} else {
				self::CreateVisitor($conn, 1, $site_id);
				setcookie(__COOKIE_VISITOR_NAME, __COOKIE_VISITOR_VALUE, __COOKIE_VISITOR_LENGTH);
			}
		}
	}
}
?>