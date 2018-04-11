<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class DestroyController extends Controller
{
    public function delete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect('dashboard/users')->with("success","User Deleted Successfully !");
    }
}
