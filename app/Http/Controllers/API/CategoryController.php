<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiController;
use App\Http\Resources\CategoryResource;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends ApiController
{
    private $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }


    public function index()
    {
        return CategoryResource::collection($this->categoryRepo->paginatedCategories());
    }


    public function show($id)
    {
        return $this->successResponse(new CategoryResource($this->categoryRepo->find($id)));
    }
}
