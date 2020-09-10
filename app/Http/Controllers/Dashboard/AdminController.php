<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Admin\StoreRequest;
use App\Http\Requests\Dashboard\Admin\UpdateRequest;

use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    
    protected $path = "dashboard.admins";

    public function index()
    {
        $this->authorizeForUser(authAdmin(),'read-admin');

        return view("{$this->path}.index",[

            'title'  => trans('dashboard.admins'),
            'admins' => Admin::paginate(),

        ]);
    }


    public function create()
    {
        $this->authorizeForUser(authAdmin(),'create-admin');

        return view("{$this->path}.create",[
            'title' => trans('dashboard.create_admin'),
            'roles' => $this->getRoles()
        ]);
    }


    public function store(StoreRequest $request)
    {
        $this->authorizeForUser(authAdmin(),'create-admin');

        $admin = Admin::create($request->except(['roles']))
                 ->syncRoles($request->roles);

        return redirect(route("{$this->path}.index"));
    }


    public function edit(Admin $admin)
    {
        $this->authorizeForUser(authAdmin(),'update-admin');

        return view("{$this->path}.edit",[

            'title' => trans('dashboard.title'),
            'admin' => $admin,
            'roles' => $this->getRoles()

        ]);
    }

    public function update(Admin $admin,UpdateRequest $request)
    {
        $this->authorizeForUser(authAdmin(),'update-admin');

        $admin->update($request->except('roles'));

        $admin->syncRoles($request->roles);

        return redirect(route("{$this->path}.index"));

    }

    public function destroy(Admin $admin)
    {
        $this->authorizeForUser(authAdmin(),'delete-admin');

        $admin->delete();
        return redirect(route("{$this->path}.index"));
    }


    protected function getRoles()
    {
        return Role::pluck('name','id');
    }
}
