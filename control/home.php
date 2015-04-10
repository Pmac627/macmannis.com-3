<?php /* home.php */

class home_ctrl extends base_ctrl {
	public function index() {
		$this->registry->template->pg = db_page::GetPageMeta($this->registry->db, 1);

		$sections = db_page::GetSections($this->registry->db);
		$this->registry->template->sections = $sections;
		$this->registry->template->firstId = self::_GetFirstId($sections);
		$this->registry->template->navHTML = self::_CreateNavHTML($sections);
		$this->registry->template->section1HTML = self::_CreateSectionHTML($sections, 1);
		$this->registry->template->section1DescrHTML = self::_CreateSectionDescrHTML($sections, 1);
		$this->registry->template->section2HTML = self::_CreateSectionHTML($sections, 2);
		$this->registry->template->section2DescrHTML = self::_CreateSectionDescrHTML($sections, 2);
		$this->registry->template->section3HTML = self::_CreateSectionHTML($sections, 3);
		$this->registry->template->section3DescrHTML = self::_CreateSectionDescrHTML($sections, 3);
		$this->registry->template->section4HTML = self::_CreateSectionHTML($sections, 4);
		$this->registry->template->section4DescrHTML = self::_CreateSectionDescrHTML($sections, 4);
		$this->registry->template->section5HTML = self::_CreateSectionHTML($sections, 5);
		$this->registry->template->section5DescrHTML = self::_CreateSectionDescrHTML($sections, 5);
		$this->registry->template->section6HTML = self::_CreateSectionHTML($sections, 6);
		$this->registry->template->section6DescrHTML = self::_CreateSectionDescrHTML($sections, 6);

		$services = db_page::GetServices($this->registry->db);
		$this->registry->template->servicesHTML = self::_CreateServicesHTML($services);

		$portfolio = db_page::GetPortfolio($this->registry->db);
		$this->registry->template->portfolioHTML = self::_CreatePortfolioHTML($portfolio, $this->site);
		$this->registry->template->portfolioModalHTML = self::_CreatePortfolioModalHTML($portfolio, $this->site);

		$about = db_page::GetAbout($this->registry->db);
		$this->registry->template->aboutHTML = self::_CreateAboutHTML($about, $this->site);

		$people = db_page::GetPeople($this->registry->db);
		$this->registry->template->peopleHTML = self::_CreatePeopleHTML($people, $this->site);

		$clients = db_page::GetClients($this->registry->db);
		$this->registry->template->clientsHTML = self::_CreateClientsHTML($clients, $this->site);

		self::Render('home');
	}

	public function contact() {
		$visitor_id = 0;
		if(__COOKIE_VISITOR_ACTIVE) {
			if(isset($_COOKIE[__COOKIE_VISITOR_NAME])) {
				$visitor = db_site::FindVisitor($this->registry->db, 1);
				if(!empty($visitor)) {
					if($visitor['whitelisted'] == 0) {
						$visitor_id = $visitor['visitor_id'];
						echo $visitor_id;
					}
				}
			}
		}

		$result = FALSE;
		$result = db_contact::ContactProcess($this->registry->db, $this->site['admin'], $this->site['admin_email'], $this->site['title'], $_POST, $visitor_id);
		return $result;
	}

	private function _CreateServicesHTML($services) {
		$servicesHTML = "";

		$service_count = count($services);
		if($service_count > 0) {
			$servicesHTML .= '
			<div class="row text-center">';
				$service_class_num = (12 / $service_count);
				foreach($services as $s) {
					$servicesHTML .= '
				<div class="col-md-' . $service_class_num . '" itemprop="makesOffer" itemscope itemtype="http://schema.org/Offer">
					<span class="fa-stack fa-4x" title="' . $s['descr'] . '">
						<i class="fa fa-circle fa-stack-2x text-primary"></i>
						<i class="fa ' . $s['css_icon'] . ' fa-stack-1x fa-inverse"></i>
					</span>
					<h4 class="service-heading" itemprop="name">' . $s['descr'] . '</h4>
					<p class="text-muted" itemprop="description">' . $s['subtitle'] . '</p>
				</div>';
				}
			$servicesHTML .= '
			</div>';
		}

		return $servicesHTML;
	}

	private function _CreatePortfolioHTML($portfolio, $site) {
		$portfolioHTML = "";
		$portfolio_count = count($portfolio);

		if($portfolio_count > 0) {
			if($portfolio_count < 4) {
				$portfolio_class_num = (12 / $portfolio_count);
			} else {
				$portfolio_class_num = 4;
			}

			$portfolioHTML .= '
			<div class="row">';

			foreach($portfolio as $k => $p) {
				$portfolioHTML .= '
				<div class="col-md-' . $portfolio_class_num . ' col-sm-6 portfolio-item">
					<a href="#portfolioModal' . $k . '" class="portfolio-link" data-toggle="modal">
						<div class="portfolio-hover">
							<div class="portfolio-hover-content">
								<i class="fa fa-plus fa-3x"></i>
							</div>
						</div>
						<img src="' . $site['base_url'] . $p['img'] . '" class="img-responsive" alt="' . $p['title'] . '" title="' . $p['title'] . '">
					</a>
					<div class="portfolio-caption">
						<h4>' . $p['title'] . '</h4>
						<p class="text-muted">' . $p['service_descr'] . '</p>
					</div>
				</div>';
			}

			$portfolioHTML .= '
			</div>';
		}

		return $portfolioHTML;
	}

	private function _CreatePortfolioModalHTML($portfolio, $site) {
		$portfolioModalHTML = "";
		$portfolio_count = count($portfolio);

		if($portfolio_count > 0) {
			if($portfolio_count < 4) {
				$portfolio_class_num = (12 / $portfolio_count);
			} else {
				$portfolio_class_num = 4;
			}

			$portfolioModalHTML .= '
			<div class="row">';

			foreach($portfolio as $k => $p) {
				$portfolioModalHTML .= '
			<div class="portfolio-modal modal fade" id="portfolioModal' . $k . '" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-content">
					<div class="close-modal" data-dismiss="modal">
						<div class="lr">
							<div class="rl">
							</div>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-lg-offset-2">
								<div class="modal-body">
									<h2>
										' . $p['title'] . '
									</h2>
									<p class="item-intro text-muted">
										' . $p['subtitle'] . '
									</p>
									<img class="img-responsive" src="' . $site['base_url'] . $p['img_preview'] . '" alt="' . $p['title'] . '" title="' . $p['title'] . '">
									<p>
										' . $p['descr'] . '
									</p>
									<ul class="list-inline">
										<li>Date: ' . $p['project_date'] . '</li>
										<li>Client: ' . $p['client'] . '</li>
										<li>Category: ' . $p['service_descr'] . '</li>
										<li>Technologies: ' . $p['technologies'] . '</li>
									</ul>
									<button type="button" class="btn btn-primary" data-dismiss="modal">
										<i class="fa fa-times"></i> Close Project
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>';
			}

			$portfolioModalHTML .= '
			</div>';
		}

		return $portfolioModalHTML;
	}

	private function _CreateAboutHTML($about, $site) {
		$aboutHTML = "";

		$about_count = count($about);
		if($about_count > 0) {
			$aboutHTML .= '
			<div class="row">
				<div class="col-lg-12">
					<ul class="timeline">';
			foreach($about as $a) {
				$about_class = "";
				if($a['inverted'] > 0) {
					$about_class = ' class="timeline-inverted"';
				}

				$aboutHTML .= '
					<li' . $about_class . '>
						<div class="timeline-image">
							<img class="img-circle img-responsive" src="' . $site['base_url'] . $a['img'] . '" alt="' . $a['title'] . '" title="' . $a['title'] . '">
						</div>
						<div class="timeline-panel">
							<div class="timeline-heading">
								<h4>' . $a['year'] . '</h4>
								<h4 class="subheading">' . $a['subtitle'] . '</h4>
							</div>
							<div class="timeline-body">
								<p class="text-muted">
									' . $a['descr'] . '
								</p>
							</div>
						</div>
					</li>';
			}
			$aboutHTML .= '
					</ul>
				</div>
			</div>';
		}

		return $aboutHTML;
	}

	private function _CreatePeopleHTML($people, $site) {
		$peopleHTML = "";

		$people_count = count($people);
		if($people_count > 0) {
			$people_class_num = (12 / $people_count);
			$peopleHTML .= '
			<div class="row">';

			foreach($people as $p) {
				$md_relationship = "member";
				$md_title = "Graphic Designer";
				if($p['name'] == 'Patrick MacMannis') {
					$md_relationship = 'founder';
					$md_title = 'Full Stack Web Developer';
				}

				$peopleHTML .= '
			<div class="col-sm-' . $people_class_num . '">
				<div class="team-member" itemprop="' . $md_relationship . '" itemscope itemtype="http://schema.org/Person">
					<img src="' . $site['base_url'] . $p['img'] . '" class="img-responsive img-circle" alt="' . $p['name'] . ' - ' . $p['motto'] . '" title="' . $p['name'] . ' - ' . $p['motto'] . '" itemprop="image">
					<h4 itemprop="name">' . $p['name'] . '</h4>
					<p class="text-muted">' . $p['motto'] . '</p>
					<meta itemprop="jobTitle" content="' . $md_title . '" />';

				if($p['url1'] != "" || $p['url2'] != "" || $p['url3'] != "") {
					$peopleHTML .= '
					<ul class="list-inline social-buttons">';

					if($p['url1'] != "") {
						$peopleHTML .= '
						<li>
							<a href="' . $p['url1'] . '" title="' . $p['url1_title'] . '" itemprop="url"><i class="fa ' . $p['url1_css_icon'] . '"></i></a>
						</li>';
					}

					if($p['url2'] != "") {
						$peopleHTML .= '
						<li>
							<a href="' . $p['url2'] . '" title="' . $p['url2_title'] . '" itemprop="url"><i class="fa ' . $p['url2_css_icon'] . '"></i></a>
						</li>';
					}

					if($p['url3'] != "") {
						$peopleHTML .= '
						<li>
							<a href="' . $p['url3'] . '" title="' . $p['url3_title'] . '" itemprop="url"><i class="fa ' . $p['url3_css_icon'] . '"></i></a>
						</li>';
					}

					$peopleHTML .= '
					</ul>';
				}

				$peopleHTML .= '
				</div>
			</div>';
			}

			$peopleHTML .= '
			</div>';
		}

		return $peopleHTML;
	}

	private function _CreateClientsHTML($clients, $site) {
		$clientsHTML = "";
		$clients_count = count($clients);
		if($clients_count > 0) {
			$clients_class_num = (12 / $clients_count);
				
			$clientsHTML .= '
				<div class="row">';

			foreach($clients as $c) {
				$clientsHTML .= '
					<div class="col-md-' . $clients_class_num . ' col-sm-6" itemprop="brand" itemscope itemtype="http://schema.org/Organization">
						<meta itemprop="name" content="' . $c['title'] . '" />
						<a href="' . $c['url'] . '" itemprop="url">
							<img src="' . $site['base_url'] . $c['img'] . '" class="img-responsive img-centered" alt="' . $c['title'] . '" title="' . $c['title'] . '" itemprop="logo">
						</a>
					</div>';
			}

			$clientsHTML .= '
				</div>';
		}

		return $clientsHTML;
	}
}
?>