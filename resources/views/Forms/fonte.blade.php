<!-- FORMULÁRIO-->

@if ( isset($font) )

<form class="form" method="post" action="{{route('fonte.update', $font->id_fonte)}}">
    {{ method_field('PUT') }} <!-- Update so aceita tipo Put ou Path -->    
    @else
    <form class="form" method="post" action="{{route('fonte.store')}}">
        @endif



        {!! csrf_field() !!}
        <div class='row'>
            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="nm_fonte" name="nm_fonte" placeholder="Nome da Fonte" value="{{$font-> nm_fonte or old('nm_fonte')}}">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Nome do Fabricantes" value="{{$font -> fabricante or old('fabricante')}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                <div class="form-group">
                    <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" value="{{$font -> modelo or old('modelo')}}">
                </div>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> 
                    @if ( isset($font) )
                    Alterar
                    @else
                    Cadastrar
                    @endif
                </button>
            </div>
        </div>
    </form>

    <!-- MENSAGEM DE SUCESSO -->
    @if(session('success-F')) 
    <div id="time" class="alert alert-success"> 
        <strong>Pronto!</strong><small> A fonte de luz foi {{Session::get('success-F')}} com sucesso.</small>
    </div> 

    <script type="text/javascript">
        setTimeout(function () {
            $('#time').fadeOut('fast');
        }, 2500);
    </script>

    @endif
    <!-- MENSAGEM DE ERRO -->
    @if (isset($errors) && count($errors) > 0)

    @foreach ($errors->all() as $error)

    <div class="alert alert-danger alert-dismissable fade in">
        <a href="#" id="time" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$error}}

    </div>
    @endforeach

    @endif

    <hr class="separa">

    <!-- TABELA -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Fonte de Luz</th>
                <th>Fabricante</th>
                <th>Modelo</th>
                <th style="width: 100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($fontes as $fonte)
            <tr>
                <td>{{$fonte->nm_fonte}}</td>
                <td>{{$fonte->fabricante}}</td>
                <td>{{$fonte->modelo}}</td>
                <td>
                    <a href="{{route('fonte.edit', $fonte->id_fonte)}}" class="edita action"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                    <!--<a href="#" class="delete actions"><span class="fa fa-trash" aria-hidden="true"></span></a>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>