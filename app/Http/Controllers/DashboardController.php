<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $id = Auth::user()->id;
        $user = User::where('id', $id)->first();
        $policies_array = explode(',', $user->policies);
        $user_policies = array();
        foreach($policies_array as $item) {
            if($item !== "") {
                $policy = Policy::where('id', $item)->first();
                array_push($user_policies, $policy);
            }
        }
        $user->policies = $user_policies;
        $policies = Policy::all();
        return view('stuff.dashboard', compact('user', 'policies'));
    }

    public function show(Request $request, $id){
        return view('stuff.show');
    }
}
