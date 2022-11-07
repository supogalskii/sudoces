@extends('layout.app')
@section('title','Criar nova Receita')
@section('content')

        <h1>Criar nova Receita</h1>
        <br>
        <br>
        {{Form::open(['route'=>'receitas.store','method'=> 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('titulo', 'Titulo: ')}}<br>
        {{Form::text('titulo','',['class'=>'form-control','required','placeholder'=>'Nome da Receita'])}}<br>
        {{Form::label('ingredientes','Ingredientes: ')}}
        {{Form::textarea('ingredientes','',['class'=>'form-control','required','placeholder'=>'Digite os Ingredientes'])}}<br>
        {{Form::label('modopreparo',  'Modo De Preparo: ')}}
        {{form::textarea('modopreparo','',['class'=>'form-control','required','placeholder'=>'Modo de Preparo'])}}<br>
        {{Form::label('info','Informações Adicionais: ')}}
        {{Form::textarea('info','',['class'=>'form-control','placeholder'=>'Informações Adicionais'])}}<br>
        {{Form::label('foto','Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br>
        {{form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)','class'=>'btn btn-outline-secondary'])!!}
        <br>
        {{Form::close()}}

        <br>
        <br>
        <div>
                <a href="http://localhost:8000/home/" class="btn btn-outline-primary">Voltar</a> 
        </div>
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