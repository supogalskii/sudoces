@extends('layout.app')
@section('title','Criar nova Receita')
@section('content')

        <h1>Criar nova Receita</h1>
        <br>
        <br>
        {{Form::open(['route'=>'receitas.store','method'=> 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('titulo', 'Titulo')}}
        {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Nome da Receita'])}}
        {{Form::label('ingredientes','Ingredientes')}}
        {{Form::text('ingredientes','',['class'=>'form-control','required','placeholder'=>'Digite os Ingredientes'])}}
        {{Form::label('modopreparo',  'Modo De Preparo')}}
        {{form::text('modopreparo','',['class'=>'form-control','required','placeholder'=>'Modo de Preparo'])}}
        {{Form::label('info','Informações Adicionais')}}
        {{Form::text('info','',['class'=>'form-control','required','placeholder'=>'Informações Adicionais'])}}
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br>
        {{form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-outline-secondary'])!!}
        <br>
        {{Form::close()}}
@endsection