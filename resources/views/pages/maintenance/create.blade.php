@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Menutenzioni</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('maintenance.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati</label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="atiId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                @foreach (ati() as $item)
                        <option value="{{$item->id}}">{{$item->description}}</option>
                                    
                                @endforeach
                               
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Oggeto Tipo</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="object_type"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    {{-- <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Oggeto</label>
                        <div class="col-sm-8" id="wrap-tipo_trasporto">

                            <select required="" data-select-2="" name="tipo_trasporto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-tipo_trasporto">
                                <option value=""> -</option>
                                <option value="1">PROGRAMMATO</option>
                                <option value="2">PRONTA DISPONIBILITA</option>
                                <option value="3">URGENTE</option>
                            </select>
                        </div>
                    </div> --}}
                    <hr>



                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-codice_localita_scarico">Agent</label>
                        <div class="col-sm-8" id="wrap-codice_localita_scarico">

                            <select name="agentId"
                                    class="form-control input-sm select2-hidden-accessible"
                                    id="crud-codice_localita_scarico">
                                <option value=""> -</option>
                                @foreach(agent() as $item)
                        <option value="{{$item->id}}">{{$item->description}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">Tipo</label>
                        <div class="col-sm-8" id="wrap-codice_cdc_scarico">

                            <select data-select-2="" name="sanificationTypeId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-codice_cdc_scarico">
                                <option value=""> -</option>
                                @foreach (sanificationsType() as $item)
                        <option value="{{$item->id}}">{{$item->description}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Time</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="time" type="time" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

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
        </form>
    </div>














@endsection