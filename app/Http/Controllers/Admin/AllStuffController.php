<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AllStuffController extends Controller
{
    //
    public function index(Request $request)
    {
        $id = $request->user()->id;
        $users = User::where('id', '<>', $id)->get();
        return view('admin.all', compact('users'));
    }

    public function create(Request $request)
    {
        $data = $request->except('_token');
        User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'email' => $data['email']
        ]);
        $id = $request->user()->id;
        $users = User::where('id', '<>', $id)->get();
        return view('admin.all', compact('users'));
    }
}