<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelBook;
use App\Models\User;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    public function index()
    {
        $book=ModelBook::all();
        return view('index',compact('book'));
    }

    public function create()
    {
        $users=User::all();
        return view('create',compact('users'));
    }

    public function store(BookRequest $request)
    {
        $cad=ModelBook::create([
            'titulo'=>$request->titulo,
            'autor'=>$request->autor,
            'genero'=>$request->genero,
            'id_user'=>$request->id_user,
            'editora'=>$request->editora,
            'ano'=>$request->ano

        ]);
        if($cad){
            return redirect('books');
        }

    }

    public function show($id)
    {
        $book=ModelBook::find($id);
        return view('show',compact('book'));
    }

    public function edit($id)
    {
        $book=ModelBook::find($id);
        $users=User::all();
        return view('create',compact('book','users'));
    }

    public function update(Request $request, $id)
    {
        ModelBook::where(['id'=>$id])->update([
            'titulo'=>$request->titulo,
            'autor'=>$request->autor,
            'genero'=>$request->genero,
            'id_user'=>$request->id_user,
            'editora'=>$request->editora,
            'ano'=>$request->ano

        ]);
        return redirect('books');
    }

    public function destroy($id)
    {
        $del=ModelBook::destroy($id);
        return($del)?"sim":"não";
    }
}
