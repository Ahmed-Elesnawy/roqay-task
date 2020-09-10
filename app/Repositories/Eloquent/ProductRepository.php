<?php 


namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface 
{
    protected $model;

    public function __construct(Product $model)
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

    public function update($idOrSlug,$attributes)
    {
        return $this->model->findOrFail($idOrSlug)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function paginatedProducts($num = null)
    {
        if ( is_null($num) )
        {
            $num = $this->model->perPage;
        }

        return $this->model->with('category')->latest()->paginate($num);
    }
}