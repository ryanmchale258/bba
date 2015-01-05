<?php

class Navigation_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function getTopNav() {
		$menu = "";

		$this->db->select('*');
		$this->db->where('pages_navlvl', 1);
		$navall = $this->db->get('tbl_pages')->result();

		$this->db->select('*');
		$this->db->or_where('pages_navlvl', 3);
		$navkids = $this->db->get('tbl_pages')->result();


		foreach($navall as $row){
			$children = array();
				foreach($navkids as $subrow){
					if($subrow->pages_navprnt == $row->pages_slug){
						$row->pages_haskids = 1;
						$childitems = array();
						$childitems['childname'] = $subrow->pages_title;
						$childitems['childlink'] = $subrow->pages_slug;
						$children[] = $childitems;
					}
				}
			if($row->pages_haskids == 1){
				$menu .= '<li class="has-dropdown"><a href="' . $row->pages_slug . '">';
				$menu .= $row->pages_title . '</a>';
				$menu .= '<ul class="dropdown">';
					foreach($children as $kids){
						$menu .= '<li><a href="' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
					}
				$menu .= '</ul>';
				$menu .= '</li>';
			}else{
				$menu .= '<li><a href="' . $row->pages_slug . '">';
				$menu .= $row->pages_title;
				$menu .= '</a></li>';
			}
		}

		return $menu;
	}

	public function getFtNav() {
		$this->db->select('*');
		$this->db->where('pages_navlvl', 2);
		$ftnav = $this->db->get('tbl_pages')->result();
			$ftmenu = '<ul>';

		foreach($ftnav as $row) {
			$ftmenu .= '<li><a href="' . $row->pages_slug . '">';
			$ftmenu .= $row->pages_title;
			$ftmenu .= '</a></li>';
		}

		$ftmenu .= '</ul>';

		return $ftmenu;
	}

}