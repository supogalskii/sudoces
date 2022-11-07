@extends('layout.app')
@section('title','Alteração Receita {{$receitas->titulo}}')
@section('content')
    <h1>Alteração Receitas {{$receitas->titulo}}</h1>
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
        {{Form::label('titulo', 'Título')}}<br>
        {{Form::text('titulo',$receitas->titulo,['class'=>'form-control','required','placeholder'=>'Título da Receita'])}} <br>
        {{Form::label('ingredientes', 'Ingredientes: ')}}<br>
        {{Form::textarea('ingredientes',$receitas->ingredientes,['class'=>'form-control','required','placeholder'=>'Ingredientes','rows'=>'15'])}}<br>
        {{Form::label('modopreparo', 'Modo de Preparo:')}}<br>
        {{Form::textarea('modopreparo',$receitas->modopreparo,['class'=>'form-control','required','placeholder'=>'Modo de Preparo'])}}<br>
        {{Form::label('info', 'Informações Adicionais:')}}<br>
        {{Form::textarea('info',$receitas->info,['class'=>'form-control','placeholder'=>'Informações Adicionais'])}}
        {{Form::label('foto', 'Foto')}}<br>
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-outline-success'])}}
        <a href="{{url('/')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
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