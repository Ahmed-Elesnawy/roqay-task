<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\UpdateRequest as AdminUpdateRequest;
use App\Http\Requests\Dashboard\Category\UpdateRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    /**
     * CategoryRepo object
     * @var $categoryRepo
    */

    private $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Base view for controller 
     * @var $path
     */

    protected $path = 'dashboard.categories';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorizeForUser(authAdmin(),'read-category');

        return view("{$this->path}.index",[

            'title'      => trans('dashboard.categories'),

            'categories' => $this->categoryRepo->paginatedCategories(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorizeForUser(authAdmin(),'create-category');

        return view("{$this->path}.create",[

            'title' => trans('dashboard.create_category'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateRequest $request)
    {
        $this->authorizeForUser(authAdmin(),'create-category');

        $category = $this->categoryRepo->create($request->only('name'));

        $response = [
            'category' => $category,
            'edit'     => authAdmin()->can('update-category'),
            'delete'   => authAdmin()->can('delete-category')            
        ];

        return response()->json($response);
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
        $this->authorizeForUser(authAdmin(),'update-category');

        $category = $this->categoryRepo->find($id);

        $this->categoryRepo->update($category,$request->only('name'));

        return response()->json($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $this->authorizeForUser(authAdmin(),'delete-category');

        $this->categoryRepo->delete($id);

        return response()->json(['message' => 'deleted!']);

    }






    
}
