<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBook;
class UserBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userBook = UserBook::all();
        if($userBook == NULL){
            return "No existen usuario_libro";
        }
        return response()->json($userBook);
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
        $userBook = new UserBook;        
        $userBook->id_user = $request->id_user;          
        $userBook->id_book = $request->id_book;  
        $userBook->save();
        return response()->json([
            "message"=>"Se a creado un userBook",
            "id"=>$userBook->id
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
        $userBook = UserBook::find($id);
        if($userBook == NULL){
            return "No existen userBook con esa id";
        }
        return response()->json($userBook);
        
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
        $userBook = UserBook::find($id);
        if($userBook == NULL){
            return "No existen userBook a modificar";
        }
        $userBook->id_user = $request->id_user;          
        $userBook->id_book = $request->id_book;  
        $userBook->save();
        return response()->json([
            "message"=>"Se actualizo el userBook",
            "id"=>$userBook->id
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
        $userBook = UserBook::find($id);
        if($userBook == NULL){
            return "No existen userBook con a eliminar";
        }
        $userBook->delete();
        return response()->json([
            "message"=>"Se elimino el userBook",
            "id"=>$userBook->id
        ]); 

    }
}
