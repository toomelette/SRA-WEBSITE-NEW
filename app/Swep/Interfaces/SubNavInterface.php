<?php

namespace App\Swep\Interfaces;
 


interface SubNavInterface {

	public function store($data, $navigation);
	
	public function findBySubNavId($slug);

	public function getAll();

	//public function getByNavigationId($nav_main_slug);
		
}