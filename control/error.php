<?php /* error.php */

class error_ctrl extends base_ctrl {
	public function index() {
		$sections = db_page::GetSections($this->registry->db);
		$this->registry->template->sections = $sections;
		$this->registry->template->navHTML = self::_CreateNavHTML($sections);

		if($this->site['open'] == 1) {
			$this->registry->template->pg = db_page::GetPageMeta($this->registry->db, 2);

			$this->registry->template->firstId = self::_GetFirstId($sections, 7);
			$this->registry->template->section7HTML = self::_CreateSectionHTML($sections, 7);
			$this->registry->template->section7DescrHTML = self::_CreateSectionDescrHTML($sections, 7);

			self::Render('error');
		} else {
			$this->registry->template->pg = db_page::GetPageMeta($this->registry->db, 3);

			$this->registry->template->firstId = self::_GetFirstId($sections, 8);
			$this->registry->template->section8HTML = self::_CreateSectionHTML($sections, 8);
			$this->registry->template->section8DescrHTML = self::_CreateSectionDescrHTML($sections, 8);

			self::Render('closed');
		}
	}

	public function closed() {
		$this->registry->template->pg = db_page::GetPageMeta($this->registry->db, 3);

		$sections = db_page::GetSections($this->registry->db);
		$this->registry->template->sections = $sections;
		$this->registry->template->firstId = self::_GetFirstId($sections, 8);
		$this->registry->template->navHTML = self::_CreateNavHTML($sections);
		$this->registry->template->section8HTML = self::_CreateSectionHTML($sections, 8);
		$this->registry->template->section8DescrHTML = self::_CreateSectionDescrHTML($sections, 8);

		self::Render('closed');
	}
}
?>