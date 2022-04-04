<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use function redirect;

class StatusUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id): RedirectResponse
    {
        $user = User::find($id);

        if ($user->status == 'enabled'){
            $user->status = 'disabled';
        }else{
            $user->status = 'enabled';
        }
        $user->save();
        return redirect()->route('usuarios.index');
    }
}
