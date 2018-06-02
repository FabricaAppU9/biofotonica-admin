@extends('Template.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><i class="fa fa-users" aria-hidden="true"></i> Gerenciar Usuários</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<!-- FORMULÁRIO-->

@if ( isset($usere) )

<form class="form" method="post" action="{{route('admin.update', $usere->id)}}">
    {{ method_field('PUT') }} <!-- Update so aceita tipo Put ou Path -->    
    @else
    <form class="form" method="post" action="{{route('admin.store')}}">
    @endif
        {!! csrf_field() !!}
    <div class="row">
        <div class="col-md-6">
            <input required placeholder="Nome" type="text" class="form-control" name="name" value="{{$usere -> name or old('name')}}">
        </div>
        <div class="col-md-6">
            @if (isset($usere))
            @else
            <input required placeholder="Usuário" type="text" class="form-control" name="username" value="{{$usere -> username or old('username')}}">
            @endif
        </div>
        
    </div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <input required minlengh="6" placeholder="Senha" type="password" class="form-control" name="password">
        </div>
        <div class="col-md-6">
            <input required minlengh="6" placeholder="Confirmar Senha" type="password" class="form-control" name="password_confirmation">
        </div>
        
    </div>
    <br>
    <div class="row">
            <div class="col-md-offset-3 col-md-6 text-center">
                <button class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> 
                    @if ( isset($usere) )
                    Alterar
                    @else
                    Cadastrar
                    @endif
                
                </button>
                @if (isset($usere))
                    <button type="submit" class="btn"><i class="fa fa-times fa-lg"></i>Cancelar</button>
                @endif
            </div>
        </div>
</form>
<br>

@if (isset($errors))
@foreach ($errors->all() as $error)
<div class="alert alert-danger alert-dismissable fade in">
        <a href="#" id="time" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$error}}

</div>
@endforeach
@endif


 <table class="table table-striped">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Administrador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            @if($user->enabled == 1)
            <tr>
                <td>{{$user->name}} ({{$user->username}})</td>
                <td>
                    @if($user->admin)
                    Sim
                    @else
                    Não
                    @endif
                </td>
                <td>
                    <a href="{{route('admin.edit',$user->id)}}" class="edita action"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                </td>
                @if($user->id == 1 || $user->id == 2)
                    <td></td>
                @else
                <td >
                        {!! Form::open(['route' => ['admin.disable', $user->id],'method' => 'PUT']) !!}
                        {!! Form::button('<i class="fa fa-trash fa-lg"></i>',['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                @endif
                
            </tr>
            @endif
            @endforeach
        </tbody>
        <br>
</table>
@endsection
