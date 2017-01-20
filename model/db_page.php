<?php /* db_page.php */

class db_page extends db {
	public function GetPageMeta($conn, $page) {
		$sql = $conn->prepare(
			'SELECT title
				, meta_descr
				, meta_keywords
				, meta_follow
				, meta_index
				, meta_canonical
				, show_me
				, deleted
				, preload_queue
			FROM pages
			WHERE page_id = ?'
		);
		$sql->bindParam(1, $page, PDO::PARAM_INT);
		$sql->execute();
		$pages = null;
		foreach($sql->fetchAll() as $record) {
			$pages = array(
				'title' => $record['title'],
				'descr' => $record['meta_descr'],
				'keywords' => $record['meta_keywords'],
				'follow' => self::ConvertToNo($record['meta_follow'], 'follow'),
				'index' => self::ConvertToNo($record['meta_index'], 'index'),
				'canonical' => $record['meta_canonical'],
				'show' => $record['show_me'],
				'deleted' => $record['deleted'],
				'preload' => $record['preload_queue']
			);
		}

		return $pages;
	}

	public function GetPagePosts($conn, $page) {
		$sql = $conn->prepare(
			'SELECT post_id
				, section
				, title
				, body
				, author
				, post_date
				, show_me
			FROM posts
			WHERE page_id = ?
				AND show_me > 0
			ORDER BY section'
		);
		$sql->bindParam(1, $page, PDO::PARAM_INT);
		$sql->execute();
		$posts = array();
		foreach($sql->fetchAll() as $record) {
			$posts[$record['post_id']] = array(
				'section' => $record['section'],
				'title' => $record['title'],
				'body' => $record['body'],
				'author' => $record['author'],
				'post_date' => $record['post_date']
			);
		}

		return $posts;
	}

	public function GetSections($conn) {
		$sql = $conn->prepare(
			'SELECT section_id
				, title
				, subtitle
				, descr
				, active
				, hide_header
			FROM sections'
		);
		$sql->execute();
		$sections = array();
		foreach($sql->fetchAll() as $record) {
			$sections[$record['section_id']] = array(
				'title' => $record['title'],
				'subtitle' => $record['subtitle'],
				'descr' => $record['descr'],
				'active' => $record['active'],
				'hide_header' => $record['hide_header']
			);
		}

		return $sections;
	}

	public function GetServices($conn) {
		$sql = $conn->prepare(
			'SELECT service_id
				, descr
				, subtitle
				, css_icon
				, active
			FROM services
			WHERE active > 0
			ORDER BY sort ASC'
		);
		$sql->execute();
		$services = array();
		foreach($sql->fetchAll() as $record) {
			$services[$record['service_id']] = array(
				'descr' => $record['descr'],
				'subtitle' => $record['subtitle'],
				'css_icon' => $record['css_icon'],
				'active' => $record['active']
			);
		}

		return $services;
	}

	public function GetPeople($conn) {
		$sql = $conn->prepare(
			'SELECT people_id
				, name
				, motto
				, img
				, url1
				, url1_title
				, url1_css_icon
				, url2
				, url2_title
				, url2_css_icon
				, url3
				, url3_title
				, url3_css_icon
				, active
			FROM people
			WHERE active > 0
			ORDER BY sort ASC'
		);
		$sql->execute();
		$people = array();
		foreach($sql->fetchAll() as $record) {
			$people[$record['people_id']] = array(
				'name' => $record['name'],
				'motto' => $record['motto'],
				'img' => $record['img'],
				'url1' => $record['url1'],
				'url1_title' => $record['url1_title'],
				'url1_css_icon' => $record['url1_css_icon'],
				'url2' => $record['url2'],
				'url2_title' => $record['url2_title'],
				'url2_css_icon' => $record['url2_css_icon'],
				'url3' => $record['url3'],
				'url3_title' => $record['url3_title'],
				'url3_css_icon' => $record['url3_css_icon'],
				'active' => $record['active']
			);
		}

		return $people;
	}

	public function GetPortfolio($conn) {
		$sql = $conn->prepare(
			'SELECT portfolio_id
				, service_descr
				, title
				, subtitle
				, img
				, img_preview
				, descr
				, project_date
				, client
				, technologies
				, active
			FROM vwPortfolioData
			WHERE active > 0'
		);
		$sql->execute();
		$portfolio = array();
		foreach($sql->fetchAll() as $record) {
			$portfolio[$record['portfolio_id']] = array(
				'service_descr' => $record['service_descr'],
				'title' => $record['title'],
				'subtitle' => $record['subtitle'],
				'img' => $record['img'],
				'img_preview' => $record['img_preview'],
				'descr' => $record['descr'],
				'project_date' => $record['project_date'],
				'client' => $record['client'],
				'technologies' => $record['technologies'],
				'active' => $record['active']
			);
		}

		return $portfolio;
	}

	public function GetAbout($conn) {
		$sql = $conn->prepare(
			'SELECT about_id
				, title
				, subtitle
				, descr
				, img
				, inverted
				, year
				, active
			FROM about
			WHERE active > 0
			ORDER BY sort ASC'
		);
		$sql->execute();
		$about = array();
		foreach($sql->fetchAll() as $record) {
			$about[$record['about_id']] = array(
				'title' => $record['title'],
				'subtitle' => $record['subtitle'],
				'descr' => $record['descr'],
				'img' => $record['img'],
				'inverted' => $record['inverted'],
				'year' => $record['year'],
				'active' => $record['active']
			);
		}

		return $about;
	}

	public function GetClients($conn) {
		$sql = $conn->prepare(
			'SELECT client_id
				, url
				, img
				, title
				, active
			FROM clients
			WHERE active > 0
			ORDER BY sort ASC'
		);
		$sql->execute();
		$clients = array();
		foreach($sql->fetchAll() as $record) {
			$clients[$record['client_id']] = array(
				'url' => $record['url'],
				'img' => $record['img'],
				'title' => $record['title'],
				'active' => $record['active']
			);
		}

		return $clients;
	}

	public function GetCerts($conn) {
		$sql = $conn->prepare(
			'SELECT cert_id
				, url
				, img
				, title
				, active
			FROM certs
			WHERE active > 0
			ORDER BY sort ASC'
		);
		$sql->execute();
		$certs = array();
		foreach($sql->fetchAll() as $record) {
			$certs[$record['cert_id']] = array(
				'url' => $record['url'],
				'img' => $record['img'],
				'title' => $record['title'],
				'active' => $record['active']
			);
		}

		return $certs;
	}

	private function ConvertToNo($bit, $meta) {
		if($bit == 0) {
			return "no" . $meta;
		} else {
			return $meta;
		}
	}
}
?>