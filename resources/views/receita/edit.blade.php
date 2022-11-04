@extends('layouts.app')
@section('title','Alteração Contato {{$receitas->titulo}}')
@section('content')
    <h1>Alteração Contato {{$receitas->titulo}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['receitas.update',$receitas->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('titulo', 'Título')}}
        {{Form::text('titulo',$receitas->titulo,['class'=>'form-control','required','placeholder'=>'Título da Receita'])}}
        {{Form::label('ingredientes', 'ingredientes')}}
        {{Form::textarea('ingredientes',$receitas->ingredientes,['class'=>'form-control','required','placeholder'=>'Ingredientes','rows'=>'8'])}}
        {{Form::label('modopreparo', 'modopreparo')}}
        {{Form::text('modopreparo',$receitas->modopreparo,['class'=>'form-control','required','placeholder'=>'Modo de Preparo'])}}
        {{Form::label('info', 'Info')}}
        {{Form::text('info',$receitas->info,['class'=>'form-control','required','placeholder'=>'Informações Adicionais'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection