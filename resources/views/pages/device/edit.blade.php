@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Dispositivi</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('devices.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati</label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="stato_richiesta"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                @foreach (ati() as $item)
                        <option @if($device->atiId==$item->id) selected value="{{$item->id}}" @endif>{{$item->description}}</option>
                                @endforeach
                                {{-- <option value="I" selected="">In Lavorazione</option>
                                <option value="R">In Attesa</option>
                                <option value="C">Pianficata</option>
                                <option value="A">Annullata</option> --}}
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Barcode</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="barcode" type="number" class="form-control input-sm" value="{{$device->barcode}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Imei</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="imei" type="number" class="form-control input-sm" value="{{$device->barcode}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Descrizione</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="description" type="text" class="form-control input-sm" value="{{$device->description}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>



@foreach ($settings as $item)
<div class="ml-2 row">
        <label class="control-label col-sm-3 ml-5 text-right font-weight-bold" for="crud-tipo_trasporto">Impostazioni </label>
        <div class="col-sm-2" id="wrap-indirizzo_carico">
        <input name="k" type="text" class="mt-2 form-control input-sm" value="{{$item->k}}"
                   placeholder="Descrizione Indirizzo Carico">
        </div>
        <div class="col-sm-2" id="wrap-indirizzo_carico">
        <input name="v" type="text" class="mt-2 form-control input-sm" value="{{$item->v}}"
                   placeholder="Descrizione Indirizzo Carico">
        </div>

    <hr>

</div>
@endforeach
                   
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
            </div>
        </form>
    </div>














@endsection