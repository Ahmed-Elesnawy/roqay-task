<?php


namespace App\Repositories\Interfaces;

interface CategoryRepositoryInterface 
{
     public function create($attributes);


     public function find($idOrSlug);

     public function update($object,$attributes);

     public function delete($id);

     public function paginatedCategories($num=null);

     public function categoriesChoices();

     public function categoriesWithProductsCount();
}