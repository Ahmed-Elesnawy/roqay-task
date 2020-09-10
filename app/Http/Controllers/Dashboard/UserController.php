<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Dashboard\User\StoreRequest;
use App\Http\Requests\Dashboard\User\UpdateRequest;

class UserController extends Controller
{

    /**
     * Base view for controller 
     * @var $path
     */

    protected $path = 'dashboard.users';
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorizeForUser(authAdmin(),'read-user');

        return view("{$this->path}.index",[

            'title' => trans('dashboard.users'),

            'users' => User::latest()->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->authorizeForUser(authAdmin(),'create-user');

        return view("{$this->path}.create",[

            'title' => trans('dashboard.create_user'),
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
        $this->authorizeForUser(authAdmin(),'create-user');

        User::create($request->validated());

        return redirect(route("{$this->path}.index"));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorizeForUser(authAdmin(),'update-user');

        return view("{$this->path}.edit",[

            'title' => trans('dashboard.edit_user'),
            'user'  => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $this->authorizeForUser(authAdmin(),'update-user');

        $user->update($request->validated());

        return redirect(route("{$this->path}.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorizeForUser(authAdmin(),'delete-user');

        $user->delete();

        return redirect(route("{$this->path}.index"));

    }
}
