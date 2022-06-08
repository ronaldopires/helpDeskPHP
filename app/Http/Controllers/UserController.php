<?php
namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show()
    {
        $users_active = User::where('status', 1)->count();
        $users_inactive = User::where('status', 0)->count();
        $users = User::All()->count();

        return [$users, $users_inactive, $users_active];
    }
}
