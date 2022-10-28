@extends('layout.app')
@section('title','Criar nova Receita')
@section('content')

        <h1>Criar nova Receita</h1>
        <br>
        <br>
        {{Form::open(['route'=>'receitas.store','method'=> 'POST'])}}
        {{Form::label('titulo', 'Titulo')}}
        {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Nome da Receita'])}}
        {{Form::label('ingredientes','Ingredientes')}}
        {{Form::text('ingredientes','',['class'=>'form-control','required','placeholder'=>'Digite os Ingredientes'])}}
        {{Form::label('modopreparo',  'Modopreparo')}}
        {{form::text('modopreparo','',['class'=>'form-control','required','placeholder'=>'Modo de Preparo'])}}
        {{Form::label('info','Info')}}
        {{Form::text('info','',['class'=>'form-control','required','placeholder'=>'Informações Adicionais'])}}
        <br>
        {{form::submit('Salvar',['class'=>'btn btn-success'])}}
        {{!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-secondary'])!!}}
        <br>
        {{Form::close()}}
@endsection