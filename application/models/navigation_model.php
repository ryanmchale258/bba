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
		$this->db->or_where('pages_navlvl', 2);
		$navkids = $this->db->get('tbl_pages')->result();


		foreach($navall as $row){
			$children = array();
				foreach($navkids as $subrow){
					if($subrow->pages_navprnt == $row->pages_slug){
						$row->pages_haskids = 1;
						$childitems = array();
						$childitems['childname'] = $subrow->pages_title;
						$childitems['childlink'] = $subrow->pages_slug;
						$childitems['controller'] = $subrow->pages_hascontroller;
						$children[] = $childitems;
					}
				}
			if($row->pages_haskids == 1){
				$menu .= '<li class="has-dropdown"><a href="' . base_url() . 'index.php/' . $row->pages_slug . '">';
				$menu .= $row->pages_title . '</a>';
				$menu .= '<ul class="dropdown">';
					foreach($children as $kids){
						if($kids['controller'] == 1){
							$menu .= '<li><a href="' . base_url() . 'index.php/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}else{
							$menu .= '<li><a href="' . base_url() . 'index.php/page/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}
					}
				$menu .= '</ul>';
				$menu .= '</li>';
			}else{
				$menu .= '<li><a href="' . base_url() . 'index.php/' . $row->pages_slug . '">';
				$menu .= $row->pages_title;
				$menu .= '</a></li>';
			}
		}

		return $menu;
	}

	public function getMobNav() {
		$mobmenu = "";

		$this->db->select('*');
		$this->db->where('pages_navlvl', 1);
		$navall = $this->db->get('tbl_pages')->result();

		$this->db->select('*');
		$this->db->or_where('pages_navlvl', 2);
		$navkids = $this->db->get('tbl_pages')->result();


		foreach($navall as $row){
			$children = array();
				foreach($navkids as $subrow){
					if($subrow->pages_navprnt == $row->pages_slug){
						$row->pages_haskids = 1;
						$childitems = array();
						$childitems['childname'] = $subrow->pages_title;
						$childitems['childlink'] = $subrow->pages_slug;
						$childitems['controller'] = $subrow->pages_hascontroller;
						$children[] = $childitems;
					}
				}
			if($row->pages_haskids == 1){
				$mobmenu .= '<li class="has-submenu"><a href="' . base_url() . 'index.php/' . $row->pages_slug . '">';
				$mobmenu .= $row->pages_title . '</a>';
				$mobmenu .= '<ul class="right-submenu">';
					$mobmenu .= '<li><a href="' . base_url() . 'index.php/page/' . $row->pages_slug . '">';
					$mobmenu .= $row->pages_title . '</a></li>';


					foreach($children as $kids){
						if($kids['controller'] == 1){
							$mobmenu .= '<li><a href="' . base_url() . 'index.php/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}else{
							$mobmenu .= '<li><a href="' . base_url() . 'index.php/page/' . $kids['childlink'] . '">' . $kids['childname'] . '</a></li>';
						}
					}
					$mobmenu .= '<li class="back"><a href="#">Back</a></li>';

				$mobmenu .= '</ul>';
				$mobmenu .= '</li>';
			}else{
				$mobmenu .= '<li><a href="' . base_url() . 'index.php/' . $row->pages_slug . '">';
				$mobmenu .= $row->pages_title;
				$mobmenu .= '</a></li>';
			}
		}

		return $mobmenu;
	}

}