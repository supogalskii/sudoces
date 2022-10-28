@extends('layout.app')
@section('title','receita - {{$receita->nome}}')
@section('content')
<h1>Receita-{{$receita->nome}}</h1>
<ul>
    <li>Titulo:{{$receita->titulo}}</li>
    <li>Ingredientes: {{$receita->ingredientes}}</li>
    <li>Modo de Preparo:{{$receita->modopreparo}}</li>
    <li>Informações Adicionais:{{$receita->info}}</li>
</ul>
{{Form::open(['route'=>['recaitas.destroy',$receitas->],'method' => 'DELETE'])}}
<a href="{{url('receitas/'.$receitas->id.'/edit')}}" class="btn btn-success">Alterar</a>
{{Form::submit('Excluir',['class'=>'btn btn-danger'])}}
<a href="{{url('receitas/')}}" class="btn btn-secondary">Voltar</a>
@endsection