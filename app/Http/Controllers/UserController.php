<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getListAdmin()
    {
        $users = User::all();
        return view('admin/user', ['users' => $users]);
    }
    public function getProfile($id)
    {
        $user = Auth::user();
        if ($user->id == $id) {
            return view('profile', ['user' => $user]);
        } else {
            echo 'Bạn không được quyên truy cập địa chỉ này';
        }

    }
}
