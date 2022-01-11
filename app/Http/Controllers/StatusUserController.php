<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StatusUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id)
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
