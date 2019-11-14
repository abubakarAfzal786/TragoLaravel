@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Pianoi</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('plans.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Ati</label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="atiId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                           @foreach(ati() as $atis)
                        <option @if($atis->id==$plan->atiId) selected value="{{$atis->id}}" @endif>{{$atis->description}}</option>
                           @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Nome</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="description" type="text" class="form-control input-sm" value="{{$plan->description}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-note">Annotazioni</label>
                        <div class="col-sm-8" id="wrap-note">


                        <textarea name="note" class="form-control input-sm" placeholder="Note">{{$plan->note}}</textarea>

                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Calendario Settimanale</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="weekdays_json"
                                    class="form-control input-sm select2-selection--multiple" id="crud-planCustomId">
                                <option @if($plan->weekdays_json=="1") selected value="1" @endif> 1</option>
                                <option @if($plan->weekdays_json=="2") selected value="2" @endif> 2</option>
                                <option @if($plan->weekdays_json=="4") selected value="4" @endif> 4</option>
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Vincolo Temp. </label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">

                            <select required="" data-select-2="" name="temperatureConstraintId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-stato_richiesta">
                                <option value=""> -</option>
                              @foreach (temprature() as $item)
                        <option @if($item->id==$plan->temperatureConstraintId) selected value="{{$item->id}}" @endif>{{$item->description}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>







                    <div class="ml-2 row">
                        <label class="control-label col-sm-3 ml-5 text-right font-weight-bold" for="crud-tipo_trasporto">Tappe </label>
                        <div class="col-sm-2" id="wrap-indirizzo_carico">
                            <input name="onDemandDate" type="time" class="mt-2 form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                        {{-- <div class="col-sm-3" id="wrap-contratto">
                            <label class="control-label col-sm-6 text-right font-weight-bold" for="crud-tipo_trasporto">  </label>

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div> --}}
                        {{-- <div class="col-sm-3" id="wrap-contratto">
                            <label class="control-label col-sm-6 text-right font-weight-bold" for="crud-tipo_trasporto">  </label>

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div> --}}

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