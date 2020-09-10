<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Product\StoreRequest;
use App\Http\Requests\Dashboard\Product\UpdateRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class ProductController extends Controller
{

    /**
     * CategoryRepo object
     * @var $categoryRepo
    */

    private $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * Base view for controller 
     * @var $path
     */

    protected $path = 'dashboard.products';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryRepositoryInterface $categoryRepo)
    {
        $this->authorizeForUser(authAdmin(),'read-product');

        return view("{$this->path}.index",[

            'title'              => trans('dashboard.products'),
            'products'           => $this->productRepo->paginatedProducts(),
            'categories_choices' => $categoryRepo->categoriesChoices()

        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $this->authorizeForUser(authAdmin(),'create-product');


        $product = $this->productRepo->create($request->validated());

        return response()->json($product);

        
    }

    

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $this->authorizeForUser(authAdmin(),'update-product');

        $this->productRepo->update($id,$request->validated());

        return response()->json($this->productRepo->find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorizeForUser(authAdmin(),'delete-product');

        $this->productRepo->delete($id);
        
        return response()->json(['message' => 'deleted!']);

    }

}
