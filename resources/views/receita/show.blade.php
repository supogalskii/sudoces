@extends('layout.app')
@section('title','receita - {{$receita->id}}')
@section('content')
@php
        @nomeimagem="";
        if(file_exists(".img/receitas".md5($receitas->id).".jpg")){
            $nomeimagem = "./img/receitass".md5($receitas->id).".jpg";
        }elseif (file_exists(".img/receitas".md5($receitas->id).".png")){
            $nomeimagem = "./img/receitas".md5($receitas->id).".png";
        }elseif(file_exists(".img/receitas".md5($receitas->id).".gif")){
            $nomeimagem = "./img/receitas".md5($receitas->id).".gif";
        }elseif(file_exists(".img/receitas".md5($receitas->id).".webp")){
            $nomeimagem = "./img/receitas".md5($receitas->id).".webp";
        }elseif(file_exists(".img/receitas".md5($receitas->id).".jpeg")){
            $nomeimagem = "./img/receitas".md5($receitas->id).".jpeg";
        }else{
            $nomeimagem =".;img/receitas/semfoto.webp";
        }  
    @endphp
    {{Html::image(asset($nomeimagem),'Foto de'.$receitas->nome,["class"=>"card-img-top thumbnail"])}}
    <div class="card-header">
        <h1>Receita-{{$receita->id}}</h1>
    </div>
<div class="card-body">
    <h3 class="card-title">Titulo:{{$receita->titulo}}</h3>
    <p class="text">Ingredientes: {{$receita->ingredientes}}<br>
        Modo de Preparo:{{$receita->modopreparo}}<br>
        Informações Adicionais:{{$receita->info}}</p>
    </div>
    <div class="card-footer">
        {{Form::open(['route'=>['receitas.destroy',$receitas->id],'method' => 'DELETE'])}}
        @if ($nomeimagem !== "./img/receitas/receitasemfoto.webp")
        {{Form::hidden('foto',$nomeimagem)}}
        @endif 
<a href="{{url('receitas/'.$receitas->id.'/edit')}}" class="btn btn-success">Alterar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger','onclik'=>'return confirm("Confirmar exclusão?")'])}}
<a href="{{url('receitas/')}}" class="btn btn-secondary">Voltar</a>
{{Form::close()}}
    </div>
</div>
@endsection