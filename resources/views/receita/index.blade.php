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
        <a class="btn btn-outline-success" href="{{url('receitas/create')}}">Criar</a>
        </div>
        <div class="cl-sm-9">
            <div class="input-group ml-5">
                @if($busca!==null)
                &nbsp;<a class="btn btn-dark" href="{{url('receitas/')}}">Todos</a>&nbsp;
                @endif
                {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                &nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar',['class'=> 'btn btn-dark'])}}
                </span>
            </div>
        </div>
    </div>    
    {{form::close()}}       
    <br />
    <table class="table table-bordered-dark" style="background-color: rgb(245, 217, 225);">
       
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
    <div>
        <a href="http://localhost:8000/home" class="btn btn-outline-primary">Voltar</a> 
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