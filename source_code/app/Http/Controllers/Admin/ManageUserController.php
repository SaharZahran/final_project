<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function index()
    {
        $all_users = User::all();
        return view('dashboard.admin.users', compact(['all_users']));
    }


    public function delete($id)
    { 
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }
}
