@extends('layout.app')

@section('title','receitas - {{$receitas->titulo}}')
@section('content')
@php
        $nomeimagem="";
        if(file_exists("./img/receitas/".md5($receitas->id).".jpg")){
            $nomeimagem = "./img/receitas/".md5($receitas->id).".jpg";
        }elseif (file_exists("./img/receitas/".md5($receitas->id).".png")){
            $nomeimagem = "./img/receitas/".md5($receitas->id).".png";
        }elseif(file_exists("./img/receitas/".md5($receitas->id).".gif")){
            $nomeimagem = "./img/receitas/".md5($receitas->id).".gif";
        }elseif(file_exists("./img/receitas/".md5($receitas->id).".webp")){
            $nomeimagem = "./img/receitas/".md5($receitas->id).".webp";
        }elseif(file_exists("./img/receitas/".md5($receitas->id).".jpeg")){
            $nomeimagem = "./img/receitas/".md5($receitas->id).".jpeg";
        }else{
            $nomeimagem ="./img/receitas/semfoto.webp";
        }  
    @endphp
    {{Html::image(asset($nomeimagem),'Foto de'.$receitas->id,["class"=>"img-thumbnail w-50 mx-auto d-block"])}}
    <div class="card-header">
        <h1>Receita-{{$receitas->id}}</h1>
    </div>
<div class="card-body">
    <h3 class="card-title">Titulo:{{$receitas->titulo}}</h3>
    <p class="text">
        <h6> Ingredientes:</h6> {{$receitas->ingredientes}}<br><br>
        <h6>Modo de Preparo:</h6>{{$receitas->modopreparo}}<br><br>
        <h6>Informações Adicionais:</h6><br>{{$receitas->info}}
    </div>
    <div class="card-footer">
        {{Form::open(['route'=>['receitas.destroy',$receitas->id],'method' => 'DELETE'])}}
        @if ($nomeimagem !== "./img/receitas/receitasemfoto.webp")
        {{Form::hidden('foto',$nomeimagem)}}
        @endif 
<a href="{{url('receitas/'.$receitas->id.'/edit')}}" class="btn btn-outline-success">Alterar</a>
{{Form::submit('Excluir',['class'=>'btn btn-outline-danger','onclik'=>'return confirm("Confirmar exclusão?")'])}}
<a href="{{url('receitas/')}}" class="btn btn-outline-secondary">Voltar</a>
{{Form::close()}}
    </div>
</div>
@endsection