<?php 


namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface 
{
    protected $model;

    public function __construct(Category $model)
    {
        $this->model = $model;
    }


    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function find($idOrSlug)
    {
      return $this->model->findOrFail($idOrSlug);
    }

    public function update($object,$attributes)
    {
        return $object->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function paginatedCategories($num = null)
    {
        if ( is_null($num) )
        {
            $num = $this->model->perPage;
        }

        return $this->model->latest()->paginate($num);
    }

    public function categoriesChoices()
    {
        return $this->model->pluck('name','id');
    }


    public function categoriesWithProductsCount()
    {
        return $this->model->withCount('products')->orderBy('products_count','DESC')->get();
    }
}