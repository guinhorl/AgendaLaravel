<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Models\ModelBook;
use App\Models\User;

class BookController extends Controller
{
    private $objUser;
    private $objBook;

    public function __construct()
    {
        $this->objUser = new User();
        $this->objBook = new ModelBook();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = $this->objBook->all();
        return view('index', compact('books'));
        //dd($this->objUser->find(1)->relBooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->objUser->all();
        return view('create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $result = $this->objBook->create([
            'title' => $request->inputTitulo,
            'pages' => $request->inputPagina,
            'price' => $request->inputPreco,
            'id_user' => $request->inputAutor
        ]);

        if($result){
            return redirect('books')->with('status', 'Cadastrado com sucesso');
        }else{
            return redirect('books')->with('status', 'Erro ao cadastrar!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = $this->objBook->find($id);
        return view('show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = $this->objBook->find($id);
        $users = $this->objUser->all();
        return view('create', compact('book', 'users'));
        //Reaproveitei o mesmo formulário de cadastro para fazer o edite
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, $id)
    {
        //Observação precisei usar o @csrf junto com o @method('PUT'), no form para poder fazer o update
        //Não sei porque!?
        $result = $this->objBook->where('id', $id)->update([
            'title' => $request->inputTitulo,
            'pages' => $request->inputPagina,
            'price' => $request->inputPreco,
            'id_user' => $request->inputAutor
        ]);
        if($result){
            return redirect('books')->with('status', 'Atualizado com sucesso');
        }else{
            return redirect('books')->with('status', 'Erro ao atualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->objBook->find($id);
        $result->delete();
        if($result){
            return redirect('books')->with('status', 'Deletado com sucesso');
        }else{
            return redirect('books')->with('status', 'Erro ao deletar!');
        }
    }


}
