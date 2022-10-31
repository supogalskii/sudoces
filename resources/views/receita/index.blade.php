@extends('layout.app')
@section('title','receitas')
@section('content')

        <h1>Receitas </h1>
        @if(Session::has('mensagem'))
        <div class="alert alert-info"> {{Session::get('mensagem')}}</div>
        @endif
        {{Form::open(['url'=>'receitas/buscar','method'=>'GET'])}}
        <div class="row">
        <div class="col-sm-3">
        <a class="btn btn-sucess" href="{{url('receitas/create')}}">Criar</a>
        </div>
        <div class="cl-sm-9">
            <div class="input-group ml-5">
                @if($busca!==null)
                &nbsp;<a class="btn btn-info" href="{{url('receitas/')}}">Todos</a>&nbsp;
                @endif
                {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                &nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar',['class'=> 'btn btn-btn-secondary'])}}
                </span>
            </div>
        </div>
    </div>    
    {{form::close()}}       
    <br />
    <table class="table table-striped">
        @foreach ($receitas as $receita)
            <tr>
                <td>
                    <a href="{{url('receitas/'.$receita->id)}}">{{$receita->titulo}}</a>
                </td>
                <td>{{$receita->ingredientes}}</td>
                <td>{{$receita->modopreparo}}</td>
                <td>{{$receita->info}}</td>

                
            </tr>
        @endforeach
    </table> 
    {{$receitas->links()}}
@endsection