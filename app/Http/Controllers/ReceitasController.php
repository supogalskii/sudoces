<?php

namespace App\Http\Controllers;

use App\Models\Receitas;
use App\Models\Receita;
use Illuminate\Http\Request;
use Session;

class ReceitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receitas::simplepaginate(5);
        return view('receita.index',array('receitas' => $receitas,'busca'=>null));
    }
    
    public function buscar(Request $request) {
        $receitas = Receitas::where('titulo','LIKE','%'.$request->input('busca').'%')->orwhere('ingredientes','LIKE','%'.$request->input('busca').'%')->orwhere('modopreparo','LIKE','%'.$request->input('busca').'%')->orwhere('info','LIKE','%'.$request->input('busca').'%')->simplepaginate(5);
        return view('receita.index',array('livros' => $receitas,'busca'=>$request->input('busca')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'titulo' => 'required|min:3',
            'ingredientes' => 'required',
            'modopreparo' => 'required',
            'info' => 'required',
        ]);
        $receitas = new Receitas();
        $receitas->titulo = $request->input('titulo');
        $receitas->ingredientes = $request->input('ingredientes');
        $receitas->modopreparo = $request->input('modopreparo');
        $receitas->info = $request->input('info');
        if($receitas->save()){
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($receitas->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\receitas'),$nomearquivo);
            }
            return redirect('receitas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receitas  $receitas
     * @return \Illuminate\Http\Response
     */
    public function show(Receitas $id)
    {
        $receitas = Receitas::find($id);
        return view('receita.show',array('receita' => $receitas));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receitas  $receitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Receitas $receitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receitas  $receitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'titulo' => 'required|min:3',
            'ingredientes' => 'required',
            'modopreparo' => 'required',
            'info' => 'required',
            
        ]);
        $receitas = Receitas::find($id);
        if($request->hasFile('foto')){
            $imagem = $request->file('foto');
            $nomearquivo = md5($receitas->id).".".$imagem->getClientOriginalExtension();
            $request->file('foto')->move(public_path('.\img\livros'),$nomearquivo);
        }
        $receitas->titulo = $request->input('titulo');
        $receitas->ingredientes = $request->input('ingredientes');
        $receitas->modopreparo = $request->input('modopreparo');
        $receitas->info  = $request->input('info');
        if($receitas->save()) {
            Session::flash('mensagem','Receita alterada com sucesso');
            return redirect('receitas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receitas  $receitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        
        $receitas = Receitas::find($id);
            if (isset($request->foto)) {
            unlink($request->foto);
            }
            $receitas->delete();
            Session::flash('mensagem','Livro Excluído com Sucesso');
            return redirect(url('livros/'));
        }
    }

