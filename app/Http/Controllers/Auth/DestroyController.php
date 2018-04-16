<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('dashboard/users')->with("success","User Deleted Successfully !");
    }
}
