<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Recipe;
use Session;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->role;

        if (($role)=="admin") {

            $users = User::all();
            $recipes = Recipe::all();
            return view('read.v_user',compact('users','recipes'));

        } else {
            return abort(404);
        }
        
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user');
    }

    public function reset_data()
    {
        $user = User::where('role','user')->delete();

        return redirect('user');
    }
}
