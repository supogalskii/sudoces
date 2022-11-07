@extends('layout.app')
@section('title','Criar novo Contato')
@section('content')

        <h1>Criar novo Contato</h1>
        <br>
        <br>
        {{Form::open(['route'=>'contatos.store','method'=> 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome Completo'])}}
        {{Form::label('email','e-mail')}}
        {{Form::text('email','',['class'=>'form-control','required','placeholder'=>'E-mail'])}}
        {{Form::label('telefone',  'Telefone')}}
        {{form::text('telefone','',['class'=>'form-control','required','placeholder'=>'(99) 99999-9999'])}}
        {{Form::label('cidade','Cidade')}}
        {{Form::text('cidade','',['class'=>'form-control','required','placeholder'=>'Nome da Cidade'])}}
        {{Form::label('estado','Estado')}}
        {{Form::text('estado','',['class'=>'form-control','required','placeholder'=>'Nome do Estado'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br>
        {{form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-outline-secondary'])!!}
        {{Form::close()}}
<br>
<br>
        <div class="row">
                <div class="position-relative" style="background-color: rgb(233, 166, 186);">
                  
                    WhatsApp: (47) 99705-0235
                    <br>
                    Instagram Comercial: Su_docesesalgados11
                    <br>
                    Facebook: Su doces
                </div>
                </div>
        @endsection