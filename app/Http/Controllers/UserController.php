<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


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
        $validate = Validator::make($request->all(),
            [
                
                'email'=>'required|max:30|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
            ],
            [
                'email.required'=>'Debe ingresar un correo electronico',
                'email.unique'=>'El correo electronico ya existe',
                'password.required'=>'Debe ingresar una contraseña',
                'password.min'=>'La contraseña debe ser de mi :min caracteres',
                'password.regex'=>'La contraseña debe cumplir el formato'
            ]
            );
        
        $validate->validate();
        $user=new User;
        $user->email = $request->email;        
        $user->password = $request->password;        
        $user->id_role = 2;
        $user->save();
        return redirect('/');
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
