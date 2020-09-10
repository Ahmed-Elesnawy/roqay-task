<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductRepositoryInterface $productRepo,CategoryRepositoryInterface $categoryRepo)
    {
        return view('frontend.products.index',[

            'products'   => $productRepo->paginatedProducts(),
            'categories' => $categoryRepo->categoriesWithProductsCount(),

        ]);
    }
}
