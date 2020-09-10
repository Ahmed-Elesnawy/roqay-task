<?php


namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface 
{
     public function create($attributes);


     public function find($idOrSlug);

     public function update($idOrSlug,$attributes);

     public function delete($id);

     public function paginatedProducts($num=null);
}