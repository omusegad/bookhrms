<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
       // $permission = Permission::all();

        return  view('roles.index', compact('users','roles'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $data = $request->all();
        dd($data);
        
        DB::table('model_has_roles')->insert([
            'role_id'    => $data['roleID'],
            'model_type' => 'App\User',
            'model_id'   => $data['employeeID']
        ]);

            // DB::table('permissions')->insert([
            //     'readID'    => $data['roleID'],
            //     'editID' => 'App\User',
            //     'model_id'   => $data['employeeID']
            // ]);

        return back();
    }

}
