@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Equipment</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('travel_requests.store') }}">
            @csrf
            <div class="card-content">
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
                                        <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                @endif
                                
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Days</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="days" type="number" class="form-control input-sm" value=""
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
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Probe.</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="probe"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                                @if(!empty($probe))
                                    @foreach($probe as $key => $list)
                                        <option value="{{$list->id}}">{{$list->description}}</option>
                                    @endforeach
                                @endif
                            </select>
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