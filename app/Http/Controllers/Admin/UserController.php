<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::role('user')->paginate(10);
        return view('admin.pages.users.index', compact('users'));
    }

    public function destroy(Request $request) {
        // dd($request->user);
        User::find($request->user)->delete();
        return redirect()->back()->with('success','User deleted successfully.');
        // return $request->all();
    }
}
