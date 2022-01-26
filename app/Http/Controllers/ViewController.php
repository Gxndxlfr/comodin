<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
class ViewController extends Controller
{

    public function register()
    {
        $users = User::all();
        
        return view('register', [
            'users' => $users,     
        ]);
    }

    public function login(Request $request){
       
        $Users = User::all();
        for($i=0;$i<count($Users);++$i){
            if(($Users[$i]->email==$request->email) and ($Users[$i]->password==$request->password)){
                $request->session()->put('id_usuario_logeado',$Users[$i]->id);
                $request->session()->put('id_role_logeado',$Users[$i]->id_role);
                return redirect('/Home');
            }
        }
        return back()->with('loginError','Credenciales incorrectas, Verifique sus datos e intentelo de nuevo');
      
    }

    public function mostrarHome()
    {
        //
        $books = Book::all();

        
        return view('home', [
            'books' => $books,
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }
}
