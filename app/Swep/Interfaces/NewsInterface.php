<?php

namespace App\Swep\Interfaces;
 


interface NewsInterface {

	public function fetch($request);

	public function store($request);

	public function update($request, $slug);

	public function destroy($slug);

	public function findBySlug($slug);

	public function findById($slug);

	public function getAll();
		
}