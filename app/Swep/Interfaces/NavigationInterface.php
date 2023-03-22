<?php

namespace App\Swep\Interfaces;
 


interface NavigationInterface {

	public function fetch($request);

	public function store($request);

	public function update($request, $slug);

	public function destroy($slug);

	public function findBySlug($slug);

	public function findByNavId($slug);

	public function getAll();
		
}