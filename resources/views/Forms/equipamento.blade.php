<!-- FORMULÁRIO-->

@if ( isset($equip) )

<form class="form" method="post" action="{{route('equip.update', $equip->id_equip)}}">
    {{ method_field('PUT') }} <!-- Update so aceita tipo Put ou Path -->    
    @else
    <form class="form" method="post" action="{{route('equip.store')}}">
        @endif
        {!! csrf_field() !!}
        <div class='row'>
            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="nm_equip" name="nm_equip" placeholder="Nome do Equipamento" value="{{$equip -> nm_equip or old('nm_equip')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input name="nm_fabricante" class="form-control" list="fabricantes" placeholder="Nome do Fabricante" value="{{$equip -> nm_fabricante or old('nm_fabricante')}}">
                        <datalist id="fabricantes">
                            @foreach ($fab as $fabs)
                            <option value="{{$fabs->nm_fabricante}}"> {{$fabs->nm_fabricante}} </option>
                            @endforeach
                        </datalist>
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="comprimento_onda" name="comprimento_onda" placeholder="Comprimento da Onda" value="{{$equip -> comprimento_onda or old('comprimento_onda')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="modo_operacao" name="modo_operacao" placeholder="Modo de Operação" value="{{$equip -> modo_operacao or old('modo_operacao')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="area" name="area" placeholder="Area" value="{{$equip -> area or old('area')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="potencia_max" name="potencia_max" placeholder="Potência Máxima" value="{{$equip -> potencia_max or old('potencia_max')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="polarizacao" name="polarizacao" placeholder="Polarização" value="{{$equip -> polarizacao or old('polarizacao')}}">
                </div>
            </div>

            <div class='col-md-6'>
                <div class="form-group ">
                    <input type="text" class="form-control" id="perfil" name="perfil" placeholder="Perfil" value="{{$equip -> perfil or old('perfil')}}">
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-offset-3 col-md-6 text-center">
                <button class="btn"><i class="fa fa-plus fa-lg" aria-hidden="true"></i> 
                    @if ( isset($equip) )
                    Alterar
                    @else
                    Cadastrar
                    @endif
                </button>
            </div>
        </div>
    </form>

    <!-- MENSAGEM DE SUCESSO -->
    @if(session('success-E')) 
    <div id="time" class="alert alert-success"> 
        <strong>Pronto!</strong><small> A doença foi {{Session::get('success-E')}} com sucesso.</small>
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
                <th>Nome do Equipamento</th>
                <th>Fabricante</th>
                <th>Comp. Onda</th>
                <th>Modo Op.</th>
                <th>Area</th>
                <th>Potência</th>
                <th>Polarização</th>
                <th>Perfil</th>
                <th style="width: 100px">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($equips as $equip)
            <tr>
                <td>{{$equip->nm_equip}}</td>
                <td>{{$equip->nm_fabricante}}</td>
                <td>{{$equip->comprimento_onda}}</td>
                <td>{{$equip->modo_operacao}}</td>
                <td>{{$equip->area}}</td>
                <td>{{$equip->potencia_max}}</td>
                <td>{{$equip->polarizacao}}</td>
                <td>{{$equip->perfil}}</td>

                <td>
                    <a href="{{route('equip.edit', $equip->id_equip)}}" class="edita action"><span class="fa fa-pencil" aria-hidden="true"></span></a>
                    <!--<a href="#" class="delete actions"><span class="fa fa-trash" aria-hidden="true"></span></a>-->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>