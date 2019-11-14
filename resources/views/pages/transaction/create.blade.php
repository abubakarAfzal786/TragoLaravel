@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Transaction</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('transaction.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati
                        </label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="ati"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                @if(!empty($ati))

                                    @foreach($ati as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                               <!--  <option value="I" selected="">In Lavorazione</option>
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

                            <select required="" data-select-2="" name="agent"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                @if(!empty($agents))
                                    @foreach($agents as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                                <!-- <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option> -->
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Device</label>
                        <div class="col-sm-8" id="wrap-tipo_trasporto">

                            <select required="" data-select-2="" name="device"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-tipo_trasporto">
                                <option value=""> -</option>
                                @if(!empty($devices))
                                    @foreach($devices as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                               <!--  <option value="1">PROGRAMMATO</option>
                                <option value="2">PRONTA DISPONIBILITA</option>
                                <option value="3">URGENTE</option> -->
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
                                @if(!empty($plans))
                                    @foreach($plans as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Type</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="transtype"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                                @if(!empty($types))
                                    @foreach($types as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">Address</label>
                        <div class="col-sm-8" id="wrap-codice_cdc_scarico">

                            <select data-select-2="" name="address"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-codice_cdc_scarico">
                                <option value=""> -</option>
                                @if(!empty($addresses))
                                    @foreach($addresses as $key => $list)
                                        <option value="{{$list->id}}">{{$list->addressDescription.' '.$list->addressAddress}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr> <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">CDC
                            </label>
                        <div class="col-sm-8" id="wrap-codice_cdc_scarico">

                            <select data-select-2="" name="cdc"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-codice_cdc_scarico">
                                <option value=""> -</option>
                                @if(!empty($cdcs))
                                    @foreach($cdcs as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Time</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="time" type="date" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-descrizione_cdc_carico"> docId</label>
                        <div class="col-sm-8" id="wrap-descrizione_cdc_carico">
                            <input name="docId" type="text" class="form-control input-sm"
                                   value="" placeholder="Descrizione CDC Carico">
                        </div>
                    </div>

                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-descrizione_cdc_carico">ddtId
                            Carico</label>
                        <div class="col-sm-8" id="wrap-descrizione_cdc_carico">
                            <input name="ddtId" type="text" class="form-control input-sm"
                                   value="" placeholder="Descrizione CDC Carico">
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