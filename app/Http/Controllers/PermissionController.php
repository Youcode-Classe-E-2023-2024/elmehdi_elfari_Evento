<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function ask(User $user)
    {
        $user->asked_Permission = true;
        $user->update();

        return redirect()->back();
    }
}
