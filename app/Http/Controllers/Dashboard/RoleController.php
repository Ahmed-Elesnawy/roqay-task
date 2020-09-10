<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    protected $path = "dashboard.roles";

    public function index()
    {

        $this->authorizeForUser(authAdmin(),'read-role');

        return view("{$this->path}.index",[

            'title' => trans('dashboard.roles'),
            'roles' => Role::paginate(),

        ]);
    }

    public function create()
    {
        $this->authorizeForUser(authAdmin(),'create-role');

        return view("{$this->path}.create",[

           'title'              => trans('dashboard.create_role'),
           'permissions'        => $this->getPermissions(), 

        ]);
    }

    public function store(Request $request)
    {
        $this->authorizeForUser(authAdmin(),'create-role');

        $data = $this->validatedData($request);

        $role = Role::create([

            'name'       => $data['name'],
            'guard_name' => 'admin'

        ])->syncPermissions($data['permissions']);

        return redirect(route('dashboard.roles.index'));
    }


    public function edit(Role $role)
    {
        $this->authorizeForUser(authAdmin(),'update-role');

        return view("{$this->path}.edit",[

            'title'       => trans('dashboard.edit_permission'),
            'role'        => $role,
            'permissions' => $this->getPermissions()

        ]);
    }


    public function update(Request $request,Role $role)
    {

       $this->authorizeForUser(authAdmin(),'update-role');

       $data = $this->validatedData($request);

       $role->update([

           'name' => $data['name']

        ]);

       $role->syncPermissions($data['permissions']);


       return redirect(route('dashboard.roles.index'));


    }


    public function destroy(Role $role)
    {

        $this->authorizeForUser(authAdmin(),'delete-role');

        $role->delete();
        
        return redirect(route('dashboard.roles.index'));
    }




    protected function getPermissions()
    {
        return Permission::pluck('name','id');
    }

    protected function validatedData($request)
    {
        $array = [

            'name'        => 'required|unique:roles',
            'permissions' => 'required', 
        ];

        if ( $request->getMethod() == 'PUT' ){

            $array['name'] = 'required|unique:roles,name,'.$request->role->id;
        }

        return $request->validate($array);
    }
}
