<?php

namespace App\Actions\Users;

use App\Models\User;

class StoreUserAction
{
    public function storeUser(array $data, User $user): User
    {
        $user->name = $data['name'];
        $user->surname = $data['surname'];
        $user->document = $data['document'];
        $user->phone_number = $data['phone_number'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $user->save();

        return $user;
    }
}
