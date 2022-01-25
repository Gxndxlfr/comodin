<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        if($users == NULL){
            return "No existen usuarios";
        }
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user=new user;
        $user->email = $request->email;        
        $user->password = $request->password;        
        $user->id_role = $request->id_role;
        $user->save();
        return response()->json([
            "message"=>"Se a creado un usuario",
            "id"=>$user->id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if($user == NULL){
            return "No existen usuarios con esa id";
        }
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
        $user = User::find($id);
        if($user == NULL){
            return "No existe el usuario a modificar";
        }

        $user->email = $request->email;        
        $user->password = $request->password;        
        $user->id_role = $request->id_role;
        $user->save();
       return response()->json([
           "message"=>"Se actualizo el user",
           "id"=>$user->id
       ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        if($user == NULL){
            return "No existen usuarios a eliminar";
        }
        $user->delete();
        return response()->json([
            "message"=>"Se elimino el user",
            "id"=>$user->id
        ]); 
    }
}
