<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function redirect;
use function view;

//Agregamos


class RolController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol' ,['only'=>['create','store']]);
        $this->middleware('permission:editar-rol' ,['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol' ,['only'=>['destroy']]);
    }

    public function index(): View
    {
        $roles = Role::paginate(5);
        return view('roles.index',compact('roles'));
    }

    public function create():View
    {
        $permission = Permission::get();
        return view('roles.crear', compact('permission'));
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
    }

    public function edit(Role $role): View
    {
//        dd($role);
//        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(UpdateRoleRequest $request, $id): RedirectResponse
    {

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    public function destroy($id): RedirectResponse
    {
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
}
