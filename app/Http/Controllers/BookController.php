<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

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
        $validate = Validator::make($request->all(),
            [
                
                'name'=>'required|unique:books,name',
                'fecha_publicacion' =>'required',
                'autor' => 'required',
                'link_descarga' => 'required',
            ],
            [
                'name.required'=>'Debe ingresar el nombre del libro',
                'name.unique'=>'El libro ya está en la libreria',
                'fecha_publicacion.required'=>'Debe ingresar la fecha de publicación del nombre',                
                'autor.required'=>'Debe ingresar el nombre del autor',                
                'link_descarga.required'=>'Debe ingresar el link de descarga del libro'
            ]
        );
        $validate->validate();
        $book= new Book;
        $book->name = $request->name;        
        $book->fecha_publicacion = $request->fecha_publicacion;        
        $book->autor = $request->autor;
        $book->link_descarga = $request->link_descarga;
        $book->save();
        return redirect('/Home');
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
