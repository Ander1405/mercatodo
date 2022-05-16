<?php

namespace App\Actions\Users;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateUserAction
{
    public function updateUser(array $data, User $user)
    {
//        dd($user);
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->document = $data['document'];
        $user->phone_number = $data['phone_number'];
        $user->email = $data['email'];
        if (!empty($data['password'])) {
            $user->password = Hash::make($data['password']);
        } else {
            $user->password = Arr::except($data, array('password'));
        }
        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->save();

        return $user;

    }
}
