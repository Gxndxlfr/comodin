<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        if($roles == NULL){
            return "No existen roles";
        }
        return response()->json($roles);
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
        $role = new Role;
        $role->name = $request->name;
        $role->save();
        return response()->json([
            "message"=>"Se a creado un rol",
            "id"=>$role->id
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
        
        return response()->json($role);
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
       $role = Role::find($id);
       if($role == NULL){
           return "No existe el rol a modificar";
       }

       $role->name = $request->name;
       $role->save();
       return response()->json([
           "message"=>"Se actualizo el rol",
           "id"=>$role->id
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
        $role = Role::find($id);
        if($role == NULL){
            return "No existen roles a eliminar";
        }
        $role->delete();
        return response()->json([
            "message"=>"Se elimino el role",
            "id"=>$role->id
        ]); 
        
    }
}
