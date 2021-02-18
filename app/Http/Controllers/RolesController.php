<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $users = User::all();
        $roles = Roles::all();
        $permission = Permission::all();

        // $role = Role::find(5);
        // $role->givePermissionTo('read articles');
        // exit;

        return  view('roles.index', compact('users','roles','permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();

        $user = User::find($data['user_id']);
        $role = Role::find($data['role_id']);
        dd( $role);

        $user->assignRole($role->name);
        return back()->with('message','Role Asigned successfully!');
    }







}
