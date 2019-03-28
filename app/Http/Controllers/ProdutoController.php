<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\File;
use Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::check()){
            $produtos = Produto::all();
            return view('produtos.index', compact('produtos'));
        }
        else{
            return redirect('/');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            return view('produtos.create');
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'preco'=> 'required|integer',
            'categoria' => 'required',
            'descricao' => 'required',
            'imagem' => 'required'
        ]);
        $produto = new Produto();

        $produto->nome = $request->get('nome');
        $produto->preco = $request->get('preco');
        $produto->categoria = $request->get('categoria');
        $produto->descricao = $request->get('descricao');

        if($request->hasfile('imagem'))
        {
            //$produto->imagem = 'teste';
            $file = $request->file('imagem');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = time().'.'.$extension;
            $file->move('storage/images/', $filename);
            $produto->imagem = 'storage/images/'. $filename;
        }

        $produto->save();
        return redirect('/produtos')->with('success', 'Produto cadastrado com sucesso!');
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

        if(Auth::check()){
            $produto = Produto::find($id);

            return view('produtos.edit', compact('produto'));
        }
        else{
            return redirect('/');
        }


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
        $request->validate([
            'nome'=>'required',
            'preco'=> 'required|integer',
            'categoria' => 'required',
            'descricao' => 'required',
            'imagem' => 'required'
        ]);

        $produto = Produto::find($id);
        $produto->nome = $request->get('nome');
        $produto->preco = $request->get('preco');
        $produto->categoria = $request->get('categoria');
        $produto->descricao = $request->get('descricao');
        $produto->imagem = $request->get('imagem');

        $produto->save();

        return redirect('/produtos')->with('success', 'O produto foi atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect('/produtos')->with('success', 'O produto foi apagado com sucesso!');
    }
}
