@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Richieste Viaggi - NUOVO</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('travel_requests.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Stato</label>
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
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Contratto</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                               @foreach(contracts() as $con)
                               <option value="{{$con->id}}">{{$con->description}}</option>
                               @endforeach
                               
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Tipologia
                            Trasporto</label>
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
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-planCustomId">Piano
                            a Richiesta</label>
                        <div class="col-sm-8" id="wrap-planCustomId">

                            <select data-select-2="" name="planCustomId"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-planCustomId">
                                <option value=""> -</option>
                                <option value="3">URGENTE</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_carico">Descrizione
                            Indirizzo
                            Carico</label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                            <input name="indirizzo_carico" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-descrizione_cdc_carico">Descrizione CDC
                            Carico</label>
                        <div class="col-sm-8" id="wrap-descrizione_cdc_carico">
                            <input name="descrizione_cdc_carico" type="text" class="form-control input-sm"
                                   value="" placeholder="Descrizione CDC Carico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-codice_localita_scarico">Indirizzo
                            Scarico</label>
                        <div class="col-sm-8" id="wrap-codice_localita_scarico">

                            <select name="codice_localita_scarico"
                                    class="form-control input-sm select2-hidden-accessible"
                                    id="crud-codice_localita_scarico">
                                <option value=""> -</option>
                                <option value="3">URGENTE</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-codice_cdc_scarico">CDC
                            Scarico</label>
                        <div class="col-sm-8" id="wrap-codice_cdc_scarico">

                            <select data-select-2="" name="codice_cdc_scarico"
                                    class="form-control input-sm select2-hidden-accessible chosen-select" id="crud-codice_cdc_scarico">
                                <option value=""> -</option>
                               @foreach(cdc() as $cd)
                               <option value="{{$cd->id}}">{{$cd->description}}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-indirizzo_scarico">Descrizione
                            Indirizzo
                            Scarico</label>
                        <div class="col-sm-8" id="wrap-indirizzo_scarico">
                            <input name="indirizzo_scarico" type="text" class="form-control input-sm" value=""
                                   placeholder="Descrizione Indirizzo Scarico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-descrizione_cdc_scarico">Descrizione CDC
                            Scarico</label>
                        <div class="col-sm-8" id="wrap-descrizione_cdc_scarico">
                            <input name="descrizione_cdc_scarico" type="text" class="form-control input-sm"
                                   value="" placeholder="Descrizione CDC Scarico">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-adr">ADR</label>
                        <div class="col-sm-8" id="wrap-adr">

                            <select required="" data-select-2="" name="adr"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-adr"
                                    tabindex="-1" aria-hidden="true">
                                <option value=""> -</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-vincolo_di_temperatura">Vincolo di
                            Temperatura</label>
                        <div class="col-sm-8" id="wrap-vincolo_di_temperatura">

                            <select required="" name="vincolo_di_temperatura"
                                    class="form-control input-sm select2-hidden-accessible"
                                    id="crud-vincolo_di_temperatura">
                                <option value=""> -</option>
                                @foreach(temprature() as $tem)
                           <option value="{{$tem->id}}">{{$tem->description}}</option>
                           @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-confezionato">Confezionato</label>
                        <div class="col-sm-8" id="wrap-confezionato">

                            <select required="" data-select-2="" name="confezionato"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-confezionato">
                                <option value=""> -</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-numero_colli">Numero
                            Colli</label>
                        <div class="col-sm-8" id="wrap-numero_colli">
                            <input name="numero_colli" type="text" class="form-control input-sm" value=""
                                   placeholder="Numero Colli">
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-note">Note</label>
                        <div class="col-sm-8" id="wrap-note">


                            <textarea name="note" class="form-control input-sm" placeholder="Note"></textarea>

                        </div>
                    </div>

                    <hr>


                </div>
            </div>
            <div class="card-footer mb-3">
                <div class="pull-right">

                    <a class="btn btn-danger btn-xs text-white">
                        Annulla
                    </a>
                    <button type="submit" class="btn btn-success btn-xs text-white">
                        Salva
                    </button>
                </div>
            </div>
        </form>
    </div>


@push('js')


<script src="{{ asset('assets/css/choosen/chosen.jquery.min.js') }}"></script>
<script>
$(".chosen-select").chosen({width: "100%"});
</script>
@endpush
@push('css')
<link rel="stylesheet" href="{{ asset('assets/css/choosen/chosen.min.css') }}">
@endpush










@endsection