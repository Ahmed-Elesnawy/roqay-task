<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ProductResource;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends ApiController
{
    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }


    public function index()
    {
        return ProductResource::collection($this->productRepo->paginatedProducts());
    }


    public function show($id)
    {
        return $this->successResponse(new ProductResource($this->productRepo->find($id)));
    }
}
