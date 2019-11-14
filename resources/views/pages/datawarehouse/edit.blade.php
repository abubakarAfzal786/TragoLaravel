@extends('layouts.app')

@section('content')
<div class="card">
<div class="card-header">
    <h4 class="mb-0">Transaction</h4>

</div>
<form class="form form-vertical" method="POST" action="{{ route('datawarehouse.update', $data->id) }}">
@csrf
@method('PUT')
<div class="card-content">
<div class="card-body">
<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati
    </label>
    <div class="col-sm-8" id="wrap-stato_richiesta">

        <select required="" data-select-2="" name="stato_richiesta"
                class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
            <option value=""> -</option>
            @foreach($ati as $key => $val)
                @if($val->id = $data->atiId)
                    <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                @else
                    <option value="{{$val->id}}">{{$val->description}}</option>
                @endif
                
            @endforeach 
            <!-- <option value="I" selected="">In Lavorazione</option>
            <option value="R">In Attesa</option>
            <option value="C">Pianficata</option>
            <option value="A">Annullata</option> -->
        </select>
    </div>
</div>
<hr>
<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold"
           for="crud-contratto">Agent</label>
    <div class="col-sm-8" id="wrap-contratto">

        <select required="" data-select-2="" name="agentst"
                class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
            <option value=""> -</option>
            @foreach($agents as $key => $val)
                @if($val->id = $data->agentId)
                    <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                @else
                    <option value="{{$val->id}}">{{$val->description}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<hr>


<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Vehicle</label>
    <div class="col-sm-8" id="wrap-tipo_trasporto">

        <select required="" data-select-2="" name="vehicle"
                class="form-control input-sm select2-hidden-accessible" id="crud-tipo_trasporto">
            <option value=""> -</option>
            @foreach($cars as $key => $val)
                @if($val->id = $data->vehicleId)
                    <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                @else
                    <option value="{{$val->id}}">{{$val->description}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>
<hr>


<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Plan</label>
    <div class="col-sm-8" id="wrap-planCustomId">

        <select data-select-2="" name="plan"
                class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
            <option value=""> -</option>
            @foreach($plans as $key => $val)
                @if($val->id = $data->planId)
                    <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                @else
                    <option value="{{$val->id}}">{{$val->description}}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<hr>

<!-- <div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Type</label>
    <div class="col-sm-8" id="wrap-planCustomId">

        <select data-select-2="" name="planCustomId"
                class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
            <option value=""> -</option>
        </select>
    </div>
</div>

<hr> -->
<!-- <div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">Address</label>
    <div class="col-sm-8" id="wrap-codice_cdc_scarico">

        <select data-select-2="" name="codice_cdc_scarico"
                class="form-control input-sm select2-hidden-accessible" id="crud-codice_cdc_scarico">
            <option value=""> -</option>
        </select>
    </div>
</div> -->

<!-- <hr> <div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">CDC
        </label>
    <div class="col-sm-8" id="wrap-codice_cdc_scarico">

        <select data-select-2="" name="codice_cdc_scarico"
                class="form-control input-sm select2-hidden-accessible" id="crud-codice_cdc_scarico">
            <option value=""> -</option>
        </select>
    </div>
</div> -->

<hr>
<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Time</label>
    <div class="col-sm-8" id="wrap-indirizzo_carico">
        <input name="time" type="data" class="form-control input-sm" value="{{$data->fine}}"
               placeholder="Descrizione Indirizzo Carico">
    </div>
</div>

<hr>


<div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold"
           for="crud-descrizione_cdc_carico"> Company</label>
    <div class="col-sm-8" id="wrap-descrizione_cdc_carico">
        <input name="company" type="text" class="form-control input-sm"
               value="{{$data->firma}}" placeholder="Descrizione CDC Carico">
    </div>
</div>

<hr>
<!-- <div class="form-group row">
    <label class="control-label col-sm-4 text-right font-weight-bold"
           for="crud-descrizione_cdc_carico">ddtId
        Carico</label>
    <div class="col-sm-8" id="wrap-descrizione_cdc_carico">
        <input name="descrizione_cdc_carico" type="text" class="form-control input-sm"
               value="" placeholder="Descrizione CDC Carico">
    </div>
</div>

<hr> -->


</div>
</div>
<div class="card-footer mb-3">
<div class="pull-right">

<a class="btn btn-warning btn-xs text-white">
    Annulla
</a>
<button type="submit" class="btn btn-success btn-xs text-white">
    Salva
</button>
</div>
</div>
</form>    </div>














@endsection