@extends('layout.app')
@section('title','Listagem de Contatos')
@section('content')

        <h1>Listagem de Contatos </h1>
        @if(Session::has('mensagem'))
        <div class="alert alert-info"> {{Session::get('mensagem')}}</div>
        @endif
        {{Form::open(['url'=>'contatos/buscar','method'=>'GET'])}}
        <div class="row">
        <div class="col-sm-3">
        <a class="btn btn-outline-success" href="{{url('contatos/create')}}">Criar</a>
        <br>
        </div>
        <div class="cl-sm-9">
            <div class="input-group ml-5">
                @if($busca!==null)
                &nbsp;<a class="btn btn-info" href="{{url('contatos/')}}">Todos</a>&nbsp;
                @endif
                {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                &nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar',['class'=> 'btn btn-outline-secondary'])}}
                </span>
            </div>
        </div>
    </div>    
    {{form::close()}}       
    <br />
    <table class="table table-bordered" style="background-color: rgb(255, 208, 222);">
        @foreach ($contatos as $contato)
            <tr>
                <td>
                    <a href="{{url('contatos/'.$contato->id)}}">{{$contato->nome}}</a>
                </td>
            </tr>
        @endforeach
    </table> 
    {{$contatos->links()}}

    <br>
    <div>
        <a href="http://localhost:8000/home" class="btn btn-outline-primary">Voltar</a> 
</div>
@endsection        