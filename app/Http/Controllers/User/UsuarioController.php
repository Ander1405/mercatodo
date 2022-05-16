<?php

namespace App\Http\Controllers\User;

use App\Actions\Users\StoreUserAction;
use App\Actions\Users\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\support\Arr;
use Illuminate\support\Facades\DB;
use Illuminate\support\Facades\Hash;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;
use function config;
use function redirect;
use function view;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only'=>['index']]);
        $this->middleware('permission:crear-usuario', ['only'=>['create','store']]);
        $this->middleware('permission:editar-usuario', ['only'=>['edit','update']]);
        $this->middleware('permission:borrar-usuario', ['only'=>['destroy']]);
    }

    public function index(): View
    {
        $usuarios = User::paginate(config('app.paginate'));
        return view('usuarios.index', compact('usuarios'));
    }


    public function create(): View
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.crear', compact('roles'));
    }


    public function store(Request $request, StoreUserAction $storeUserAction): RedirectResponse
    {
        $storeUserAction->storeUser($request->all(),new User());

        return redirect()->route('usuarios.index');
    }

    public function edit(User $usuario): View
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $usuario->pluck('name', 'name')->all();
        return view('usuarios.editar', compact('usuario', 'roles', 'userRole'));
    }


    public function update(Request $request,  User $usuario, UpdateUserAction $updateUserAction): RedirectResponse
    {
        $updateUserAction->updateUser($request->all(),$usuario);

        $usuario->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }


    public function destroy($id): RedirectResponse
    {
        $userDelete = User::find($id);
        $userDelete->delete();
        return redirect()->route('usuarios.index');
    }
}
