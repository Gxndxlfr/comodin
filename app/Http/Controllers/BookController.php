<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $books = Book::all();
        if($books == NULL){
            return "No existen libros";
        }
        return response()->json($books);
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
        $book= new Book;
        $book->name = $request->email;        
        $book->fecha_publicacion = $request->fecha_publicacion;        
        $book->autor = $request->autor;
        $book->link_descarga = $request->link_descarga;
        $book->save();
        return response()->json([
            "message"=>"Se a creado un libro",
            "id"=>$book->id
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
        $book = Book::find($id);
        if($book == NULL){
            return "No existen libros con esa id";
        }
        return response()->json($book);
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
        $book = Book::find($id);
        if($book == NULL){
            return "No existe el libro a modificar";
        }

        $book->name = $request->email;        
        $book->fecha_publicacion = $request->fecha_publicacion;        
        $book->autor = $request->autor;
        $book->link_descarga = $request->link_descarga;
        $book->save();
       return response()->json([
           "message"=>"Se actualizo el libro",
           "id"=>$book->id
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
        $book = Book::find($id);
        if($book == NULL){
            return "No existe el libro a eliminar";
        }
        $book->delete();
        return response()->json([
            "message"=>"Se elimino el libro",
            "id"=>$book->id
        ]); 

    }
}
