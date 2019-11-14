@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Richiesta Piani</h4>

        </div>
        <form class="form form-vertical" method="POST" action="{{ route('plans.store') }}">
            @csrf
            <div class="card-content">
                <div class="card-body">
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-stato_richiesta">Data</label>
                        <div class="col-sm-8" id="wrap-stato_richiesta">
                            <div class="col-sm-12" id="wrap-indirizzo_carico">
                            <input name="planDate" type="date" class="form-control input-sm" value="{{date('Y-M-d',strtotime($planRequest->planDate))}}"
                                       placeholder="Descrizione Indirizzo Carico">
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Giro Pianificato</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="planId"
                                    class="form-control chosen-select input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                @foreach (plan() as $item)
                        <option @if($planRequest->planId==$item->id) selected value="{{$item->id}}" @endif>{{$item->description}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <hr>


                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-tipo_trasporto">Nome (Visibile da Palmare)  </label>
                        <div class="col-sm-8" id="wrap-indirizzo_carico">
                        <input name="note" type="text" class="form-control input-sm" value="{{$planRequest->note}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                    </div>

                    <hr>

@foreach ($places as $place)
    

                    <div class="row">
                        <label class="control-label col-sm-3 ml-5 text-right font-weight-bold" for="crud-tipo_trasporto">Orario  </label>
                        <div class="col-sm-2" id="wrap-indirizzo_carico">
                        <input name="jsontime" type="time" class="mt-2 form-control input-sm" value="{{date('h:i A',strtotime($place->dateTime))}}"
                                   placeholder="Descrizione Indirizzo Carico">
                        </div>
                        <div class="col-sm-3" id="wrap-contratto">
                            <label class="control-label col-sm-6 text-right font-weight-bold" for="crud-tipo_trasporto">Indirizzo  </label>

                            <select required="" data-select-2="" name="jsonaddress"
                                    class="form-control input-sm chosen-select select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                               @foreach (address() as $item)
                        <option @if($place->addressId==$item->id) selected value="{{$item->id}}" @endif>{{$item->description}}</option>
                               @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3" id="wrap-contratto">
                            <label class="control-label col-sm-6 text-right font-weight-bold" for="crud-tipo_trasporto">CDC  </label>

                            <select required="" data-select-2="" name="jsoncdc"
                                    class="form-control input-sm chosen-select select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                @foreach (cdc() as $item)
                        <option @if($place->cdcId==$item->id) selected value="{{$item->id}}" @endif>{{$item->description}}</option>
                                    
                                @endforeach
                                
                            </select>
                        </div>

                    </div>

              
                    @endforeach

                    {{-- <div class="row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Giro Pianificato</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div>
                    </div> --}}

                    <hr>








                    <div class="form-group row">
                        <label class="control-label col-sm-4 text-right font-weight-bold" for="crud-note">Note</label>
                        <div class="col-sm-8" id="wrap-note">


                            <textarea name="note1" class="form-control input-sm" placeholder="Note"></textarea>

                        </div>
                    </div>

                    <hr>
                    {{-- <div class="row">
                        <label class="control-label col-sm-4 text-right font-weight-bold"
                               for="crud-contratto">Giro Pianificato</label>
                        <div class="col-sm-8" id="wrap-contratto">

                            <select required="" data-select-2="" name="contratto"
                                    class="form-control input-sm select2-hidden-accessible" id="crud-contratto">
                                <option value=""> -</option>
                                <option value="1">AUSL ROMAGNA</option>
                                <option value="2">I.R.C.S.S Meldola</option>
                            </select>
                        </div>
                    </div> --}}

                   

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