@extends('Template.main')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header text-center"><i class="fa fa-info-circle" aria-hidden="true"></i> DashBoard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Dashboard</a> / </li>
    </ol>
</div>

<!----------------------------------- AREA COLAPSE #FONTE DE LUZ# -------------------------------- -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="fonteluz">
                    <h5 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#fonte" aria-expanded="{{$aeF or ' '}}" aria-controls="fonte">
                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                            Fonte de Luz
                        </a>
                    </h5>
                </div>
                <div id="fonte" class="panel-collapse collapse {{$inF or ''}}" role="tabpanel" aria-labelledby="fonteluz">
                    <div class="panel-body">

                        @include('Forms.fonte')

                    </div>
                </div>
            </div>

            <!----------------------------------- AREA COLAPSE #EQUIPAMENTOS# -------------------------------- -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="equipamento">
                    <h5 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#equip" aria-expanded="{{$aeE or ' '}}" aria-controls="equip">
                            <i class="fa fa-map-pin" aria-hidden="true"></i>
                            Equipamento
                        </a>
                    </h5>
                </div>
                <div id="equip" class="panel-collapse collapse {{$inE or ''}}" role="tabpanel" aria-labelledby="equipamento">
                    <div class="panel-body">

                        @include('Forms.equipamento')

                    </div>
                </div>
            </div>
            
            <!----------------------------------- AREA COLAPSE #DOENÇA# -------------------------------- -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="doenca">
                    <h5 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#doe" aria-expanded="{{$aeD or ' '}}" aria-controls="doe">
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                            Doenças
                        </a>
                    </h5>
                </div>
                <div id="doe" class="panel-collapse collapse {{$inD or ''}}" role="tabpanel" aria-labelledby="doenca">
                    <div class="panel-body">

                        @include('Forms.doenca')

                    </div>
                </div>
            </div>
            
            <!----------------------------------- AREA COLAPSE #TRATAMENTO# -------------------------------- -->

            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="tratamento">
                    <h5 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#trata" aria-expanded="{{$aeT or ' '}}" aria-controls="trata">
                            <i class="fa fa-exclamation" aria-hidden="true"></i>
                            Tratamento
                        </a>
                    </h5>
                </div>
                <div id="trata" class="panel-collapse collapse {{$inT or ''}}" role="tabpanel" aria-labelledby="tratamento">
                    <div class="panel-body">

                      @include('Forms.trata')

                    </div>
                </div>
            </diV>
            
            
        </div>

    </div>
</div>

@endsection