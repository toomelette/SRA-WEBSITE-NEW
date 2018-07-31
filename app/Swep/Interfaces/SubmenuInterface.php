<?php

namespace App\Swep\Interfaces;
 


interface SubmenuInterface {

	public function store($data, $menu);
	
	public function findBySubmenuId($submenu_id);

	public function globalFetchAll();

	public function apiGetByMenuId($menu_id);
		
}