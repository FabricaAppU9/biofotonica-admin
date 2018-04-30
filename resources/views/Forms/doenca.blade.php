<!-- FORMULÁRIO-->

@if ( isset($doe) )

<form class="form" method="post" action="{{route('doenca.update', $doe->cid)}}">
    {{ method_field('PUT') }} <!-- Update so aceita tipo Put ou Path -->    
    @else
    <form class="form" method="post" action="{{route('doenca.store')}}">
        @endif
        {!! csrf_field() !!}
        <div class='row'>
            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="cid" name="cid" placeholder="C.I.D - Código Internacional de Doença" value="{{$doe -> cid or old('cid')}}">
                </div>
            </div>
            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="nome_doenca" name="nome_doenca" placeholder="Nome da Doença" value="{{$doe -> nome_doenca or old('nome_doenca')}}">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-offset-3 col-md-6 text-center">
                <button class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> 
                    @if ( isset($doe) )
                    Alterar
                    @else
                    Cadastrar
                    @endif
                </button>
            </div>
        </div>
    </form>

    <!-- MENSAGEM DE SUCESSO -->
    @if(session('success-D')) 
    <div id="time" class="alert alert-success"> 
        <strong>Pronto!</strong><small> A doença foi {{Session::get('success-D')}} com sucesso.</small>
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
                <th>C.I.D</th>
                <th>Nome da Doença</th>
                <th style="width: 100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doencas as $doenca)
            <tr>
                <td>{{$doenca->cid}}</td>
                <td>{{$doenca->nome_doenca}}</td>
                <td>
                    <a href="{{route('doenca.edit', $doenca->cid)}}" class="edita action"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                    <!--<a href="#" class="delete actions"><span class="fa fa-trash" aria-hidden="true"></span></a>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>