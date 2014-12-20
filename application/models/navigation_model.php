<?php

class Navigation_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	function getTop(){
		$this->db->select('pages_slug, pages_title');
		$toplvl = $this->db->get_where('tbl_pages', array( 'pages_navlvl' => 1 ))->result();
		return $toplvl;
	}

	function getChildren(){
		$this->db->select('pages_slug, pages_title, pages_navprnt');
		$children = $this->db->get_where('tbl_pages', array( 'pages_navlvl' => 3 ))->result();
		return $children;
	}

	function buildList(){
		$toplvl = $this->getTop();
		$children = $this->getChildren();

		$list = '<ul>';

		foreach($toplvl as $topkey => $topval) {
			foreach($children as $chldkey => $childval){
				if($chldrow->pages_navprnt == $toprow->pages_slug)
					$list .= '<li class="haschild">' . $toprow->pages_title . '</li>';
				}else{
					$list .= '<li>' . $toprow->pages_title . '</li>';
				}
			}
		}

		$list .= '</ul>';

		return $list;
	}

}