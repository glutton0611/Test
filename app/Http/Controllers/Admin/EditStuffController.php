<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use App\Models\User;

class EditStuffController extends Controller
{
    //
    public function index(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $policies_array = explode(',', $user->policies);
        $user_policies = array();
        foreach ($policies_array as $item) {
            if ($item !== "") {
                $policy = Policy::where('id', $item)->first();
                array_push($user_policies, $policy);
            }
        }
        $user->policies = $user_policies;
        $policies = Policy::all();
        return view('admin.edit', compact('user', 'policies'));
    }

    public function remove_user(Request $request, $id)
    {
        User::find($id)->delete();
        return redirect('admin/all');
    }

    public function get_policies(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $policies_array = explode(',', $user->policies);
        $policies_id_array = array();
        foreach ($policies_array as $item) {
            if ($item !== "") {
                array_push($policies_id_array, $item);
            }
        }
        $remainingRows = Policy::whereNotIn('id', $policies_id_array)
                ->get();
        return response()->json($remainingRows);
    }

    public function remove_policy(Request $request, $id)
    {
        $policy_id = $request->only('policy_id');
        $user = User::where("id", $id)->first();
        $policies_array = explode(',', $user->policies);
        $user_policies = array();
        foreach ($policies_array as $item) {
            if ($item !== $policy_id['policy_id']) {
                array_push($user_policies, $item);
            }
        }
        $update_policies_string = implode(",", $user_policies);
        User::where("id", $id)->update(["policies" => $update_policies_string]);
        return response()->json("ok");
    }

    public function add_policy(Request $request, $id)
    {
        $policy_id = $request->only('policy_id');
        $user = User::where("id", $id)->first();
        $policies_array = explode(',', $user->policies);
        array_push($policies_array, $policy_id['policy_id']);
        $update_policies_string = implode(",", $policies_array);
        User::where('id', $id)->update(['policies' => $update_policies_string]);
        $policy = Policy::where('id', $policy_id)->first();
        return response()->json(array("policy" => $policy, "user" => $id));
    }
}