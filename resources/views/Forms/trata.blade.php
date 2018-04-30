<!-- FORMULÁRIO-->

@if ( isset($trata) )

<form class="form" method="post" action="{{route('trata.update', $trata->id)}}">
    {{ method_field('PUT') }} <!-- Update so aceita tipo Put ou Path -->    
    @else
    <form class="form" method="post" action="{{route('trata.store')}}">
        @endif
        {!! csrf_field() !!}
        <div class='row'>
            <div class='col-md-6'>
                <div class="form-group ">
                    <!-- <input type="text" class="form-control" id="nm_fonte" name="nm_fonte" placeholder="Nome da Fonte de luz" value="{{$trata -> nm_fonte or old('nm_fonte')}}"> -->
                    <select name="nm_fonte" class="form-control">
                    <option value='{{$trata->nm_fonte or ''}}'> {{$trata->nm_fonte or '### Selecione a Fonte de Luz ###'}}</option>
                    <option value=''> --- </option>
                            @foreach ($fontes2 as $fonte2)
                        <option value="{{$fonte2->nm_fonte}}"> {{$fonte2->nm_fonte}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <!--input type="text" class="form-control" id="cid" name="cid" placeholder="CID" value="{{$trata -> cid or old('cid')}}"-->
                    <select name="cid" class="form-control">
                        <option value='{{$trata->cid or ''}}'>{{$trata->cid or ('### Selecione o C.I.D ###')}} </option>
                        @foreach ($doencas2 as $doenca2)
                        <option value="{{$doenca2->cid}}"> {{$doenca2->cid}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <!--input type="text" class="form-control" id="nm_equip" name="nm_equip" placeholder="Nome do Equipamento" value="{{$trata -> nm_equip or old('nm_equip')}}"-->
                    <select name="nm_equip" class="form-control">
                        <option value='{{$trata->nm_equip or ''}}'>{{$trata->nm_equip or ('### Selecione um Equipamento ###')}} </option>
                        @foreach ($equips2 as $equip2)
                        <option value="{{$equip2->nm_equip}}"> {{$equip2->nm_equip}} </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="tempo" name="tempo" placeholder="Duração da Sessão" value="{{$trata -> tempo or old('tempo')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="sessoes" name="sessoes" placeholder="Sessoes" value="{{$trata -> sessoes or old('sessoes')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="freq" name="freq" placeholder="Frequencia" value="{{$trata -> freq or old('freq')}}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6 text-center">
                <button class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> 
                    @if ( isset($trata) )
                    Alterar
                    @else
                    Cadastrar
                    @endif
                </button>
            </div>
        </div>
    </form>

    <!-- MENSAGEM DE SUCESSO -->
    @if(session('success-T')) 
    <div id="time" class="alert alert-success"> 
        <strong>Pronto!</strong><small> A doença foi {{Session::get('success-T')}} com sucesso.</small>
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
                <th>C.i.D</th>
                <th>Equipamento</th>
                <th>Duração</th>
                <th>Sessões</th>
                <th>Frequencia</th>

                <th style="width: 100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tratas as $trata)
            <tr>
                <td>{{$trata->nm_fonte}}</td>
                <td>{{$trata->cid}}</td>
                <td>{{$trata->nm_equip}}</td>
                <td>{{$trata->tempo}}</td>
                <td>{{$trata->sessoes}}</td>
                <td>{{$trata->freq}}</td>

                <td>
                    <a href="{{route('trata.edit', $trata->id)}}" class="edita action"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                    <!--<a href="#" class="delete actions"><span class="fa fa-trash" aria-hidden="true"></span></a>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>