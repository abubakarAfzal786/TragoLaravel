@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Equipment</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('equipment.update' , $equip->id) }}">
            @csrf
            @method("PUT")
            <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">ddt@doc
                        </label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="stato_richiesta"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                @if(!empty($ati))
                                    @foreach($ati as $key => $val)
                                        @if($val->id == $equip->atiId)
                                            <option value="{{$val->id}}" selected="">{{$val->description}}</option>
                                        @else
                                            <option value="{{$val->id}}">{{$val->description}}</option>
                                        @endif
                                        
                                    @endforeach
                                @endif
                                
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Days</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="days" type="number" class="form-control input-sm" value="{{$equip->sanificationIntervalDays}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    
                    
                    <hr>
                    <!-- <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Barcode</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="barcode" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr> -->


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Vincolo Temp.</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="temp"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                                @if(!empty($temp))
                                    @foreach($temp as $key => $list)

                                        @if($list->id == $equip->temperatureConstraintId)
                                            <option value="{{$list->id}}" selected="">{{$list->description}}</option>
                                        @else
                                            <option value="{{$list->id}}">{{$list->description}}</option>
                                        @endif
                                        
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Probe.</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select disabled="" data-select-2="" name="probe"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                                @if(!empty($probe))
                                    @foreach($probe as $key => $list)
                                        @if($list->id == $equip->probeId)
                                            <option value="{{$list->id}}" selected="">{{$list->description}}</option>
                                        @else
                                            <option value="{{$list->id}}">{{$list->description}}</option>
                                        @endif
                                        
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr>

                    


                </div>

            <!-- <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">ddt@doc
                        </label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="stato_richiesta"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                                <option value="I" selected="">In Lavorazione</option>
                                <option value="R">In Attesa</option>
                                <option value="C">Pianficata</option>
                                <option value="A">Annullata</option>
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Time</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="indirizzo_carico" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Contenitore
                        </label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Contenitore Tipo</label>
                        <div class="col-sm-8" id="wrap-tipo_trasporto">

                            <select required="" data-select-2="" name="tipo_trasporto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-tipo_trasporto">
                                <option value=""> -</option>
                                <option value="1">PROGRAMMATO</option>
                                <option value="2">PRONTA DISPONIBILITA</option>
                                <option value="3">URGENTE</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Qty</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="indirizzo_carico" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Vincolo Temp.</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="planCustomId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Trasp. Tipo</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="planCustomId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                </div> -->
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