@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Dispositivi</h4>

        </div>

        <form class="form form-vertical" method="POST" action="{{ route('vehicles.update' , $car->id) }}">
            @csrf
            @method('PUT')
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati</label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="stato_richiesta"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                @if(!empty($ati))
                                    @foreach($ati as $key => $val)
                                        @if($val->id == $car->atiId)
                                            <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                                        @else
                                            <option value="{{$val->id}}" >{{$val->description}}</option>
                                        @endif
                                    @endforeach
                                @endif    

                                <!-- <option value="I" selected="">In Lavorazione</option>
                                <option value="R">In Attesa</option>
                                <option value="C">Pianficata</option>
                                <option value="A">Annullata</option> -->
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Marca</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="brand" type="text" class="form-control input-sm" value="{{$car->brand}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Modello</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="model" type="text" class="form-control input-sm" value="{{$car->model}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Barcode</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="barcode" type="text" class="form-control input-sm" value="{{$car->barcode}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Descrizione</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="description" type="text" class="form-control input-sm" value="{{$car->description}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr> <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Targa</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="numberPlate" type="text" class="form-control input-sm" value="{{$car->plateNumber}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>



                </div>
                <div class="card-footer mb-3">
                    <div class="pull-right">

                        <a class="btn btn-warning btn-xs text-white">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-success btn-xs text-white">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>














@endsection