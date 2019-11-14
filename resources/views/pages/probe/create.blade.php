@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Sonde</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('probe.store') }}">
            @csrf
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
                                        <option value="{{$val->id}}">{{$val->description}}</option>
                                    @endforeach
                                @endif
                            <!--     <option value="I" selected="">In Lavorazione</option>
                                <option value="R">In Attesa</option>
                                <option value="C">Pianficata</option>
                                <option value="A">Annullata</option> -->
                            </select>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Barcode</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="barcode" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Nome</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="description" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Valida fino</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="date" type="date" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Adibito a</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="usedas"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="AUSL ROMAGNA">AUSL ROMAGNA</option>
                                <option value="I.R.C.S.S Meldola">I.R.C.S.S Meldola</option>
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