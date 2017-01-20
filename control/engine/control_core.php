<?php /* control_core.php */

abstract class base_ctrl {
	protected $registry;

	function __construct($registry) {
		$this->registry = $registry;
		$this->registry->template->site = db_site::GetSiteMeta($this->registry->db, 1);

		if(__COOKIE_VISITOR_ACTIVE) {
			$this->registry->template->visitor = db_site::LogVisitor($this->registry->db, 1);
		}
	}

	abstract function index();

	protected function Render($page) {
		$this->registry->template->show('header');
		if($this->site['open'] == 1) {
			$this->registry->template->show($page);
		} else {
			$this->registry->template->show('closed');
		}
		$this->registry->template->show('footer');
	}

	protected function Redirect($page) {
		header('Location: ' . $page, true);
		die();
	}

	protected function _GetFirstId($sections, $override_id = 0) {
		$firstId = '';

		if($override_id == 0) {
			if($sections[1]['active'] > 0) {
				$firstId = '#services';
			} elseif ($sections[2]['active'] > 0) {
				$firstId = '#portfolio';
			} elseif ($sections[9]['active'] > 0) {
				$firstId = '#certs';
			} elseif ($sections[3]['active'] > 0) {
				$firstId = '#about';
			} elseif ($sections[4]['active'] > 0) {
				$firstId = '#people';
			} elseif ($sections[5]['active'] > 0) {
				$firstId = '#contact';
			} else {
				$firstId = '#services';
			}
		} else {
			switch ($override_id) {
				case 1:
					$firstId = '#services';
					break;
				case 2:
					$firstId = '#portfolio';
					break;
				case 3:
					$firstId = '#about';
					break;
				case 4:
					$firstId = '#people';
					break;
				case 5:
					$firstId = '#contact';
					break;
				case 6:
					$firstId = '#clients';
					break;
				case 7:
					$firstId = '#error';
					break;
				case 8:
					$firstId = '#closed';
					break;
				case 9:
					$firstId = '#certs';
					break;
				default:
					$firstId = '#services';
					break;
			}
		}

		return $firstId;
	}

	protected function _CreateNavHTML($sections) {
		$navHTML = "";

		if($sections[1]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#services" title="Services">Services</a>
		</li>';
		}
		if($sections[2]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#portfolio" title="Portfolio">Portfolio</a>
		</li>';
		}
		if($sections[9]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#certs" title="Certifications">Certifications</a>
		</li>';
		}
		if($sections[3]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#about" title="About">About</a>
		</li>';
		}
		if($sections[4]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#people" title="People">People</a>
		</li>';
		}
		
		$navHTML .= '
		<li>
			<a href="http://blog.macmannis.com/" title="Blog">Blog</a>
		</li>';
		
		if($sections[5]['active'] > 0) {
			$navHTML .= '
		<li>
			<a class="page-scroll" href="#contact" title="Contact">Contact</a>
		</li>';
		}

		return $navHTML;
	}

	protected function _CreateSectionHTML($sections, $section_id) {
		$sectionHTML = "";

		if(($sections[$section_id]['title'] != "" || $sections[$section_id]['subtitle'] != "") && ($sections[$section_id]['hide_header'] == 0)) {
			$sectionHTML .= '
			<div class="row">
				<div class="col-lg-12 text-center">';
			if($sections[$section_id]['title'] != "") {
				$sectionHTML .= '
					<h2 class="section-heading">' . $sections[$section_id]['title'] . '</h2>';
			}
			if($sections[$section_id]['subtitle'] != "") {
				$sectionHTML .= '
					<h3 class="section-subheading text-muted">' . $sections[$section_id]['subtitle'] . '</h3>';
			}
			$sectionHTML .= '
				</div>
			</div>';
		}

		return $sectionHTML;
	}

	protected function _CreateSectionDescrHTML($sections, $section_id) {
		$sectionDescrHTML = "";

		if($sections[$section_id]['descr'] != "") {
			$sectionDescrHTML .= '
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 text-center">
					<p class="large text-muted">
						' . $sections[$section_id]['descr'] . '
					</p>
				</div>
			</div>';
		}

		return $sectionDescrHTML;
	}

}
?>