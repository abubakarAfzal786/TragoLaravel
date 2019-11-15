@extends('layouts.app')

@section('style')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END: Page CSS-->
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Richieste Viaggi</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Richieste Viaggi
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('travel_requests.create') }}" class="btn btn-primary pull-right"> <i
                        class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Richieste Viaggi</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Gestione urgenti, programmate ed in pronta disponibilità</p>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th><a href="#">Id </a></th>
                                        <th><a href="#">Stato </a></th>
                                        <th><a href="#">Orario</a></th>
                                        <th><a href="#">Tipologia Trasporto</a></th>
                                        <th><a href="#">Piano a Richiesta</a></th>
                                        <th><a href="#">Data ora Viaggio Da </a></th>
                                        <th><a href="#">Data ora Viaggio A </a></th>
                                        <th><a href="#">Categoria Trasporto</a></th>
                                        <th><a href="#">CDC Richiedente</a></th>
                                        <th><a href="#">Recapito Richiedente</a></th>
                                        <th><a href="#">Indirizzo Carico</a></th>
                                        <th><a href="#">CDC Carico</a></th>
                                        <th><a href="#">Indirizzo Scarico </a></th>
                                        <th><a href="#">CDC Scarico</a></th>
                                        <th><a>Azioni</a></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($travelRequest as $request)
                                        <tr>
                                            <td>{{$request->id}}</td>
                                            <td>
                                                @if($request->stato_richiesta == 'I')
                                                    <span class="badge badge-warning"> In Lavorazione </span>
                                                @elseif($request->stato_richiesta == 'R')
                                                    <span class="badge badge-danger"> In Attesa </span>
                                                @elseif($request->stato_richiesta == 'C')
                                                    <span class="badge badge-info"> Completata </span>
                                                @elseif($request->stato_richiesta == 'A')
                                                    <span class="badge badge-default"> Annullata </span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $dt = new \DateTime($request->data_ora_ricezione, new \DateTimeZone('UTC'));
                                                $dt->setTimezone(new \DateTimeZone('Europe/Rome'));
                                                    $dt->format('Y-m-d H:i:s');
                                                    echo $dt->format('d/m H:i');
                                                @endphp

                                            </td>
                                            <td>
                                                @if($request->tipo_trasporto == '1')
                                                    <span class="badge badge-info"> PROGRAMMATO </span>
                                                @elseif($request->tipo_trasporto == '2')
                                                    <span class="badge badge-warning"> PRONTA DISPONIBILITA </span>
                                                @elseif($request->tipo_trasporto == '3')
                                                    <span class="badge badge-danger"> URGENTE </span>
                                                @endif
                                            </td>
                                            @if($request->planCustom)
                                            <td>
                                                
                                                {{ $request->planCustom->id . ' | ' . $request->planCustom->description }}
                                            </td>
                                            @endif
                                            <td>{{ date("d/m/Y H:i", strtotime($request->data_ora_viaggio_dal)) }}</td>
                                            <td>{{ date("d/m/Y H:i", strtotime($request->data_ora_viaggio_al)) }}</td>
                                            <td> @if(isset($request->transportationType->id)) {{ $request->transportationType->id . ' | ' . $request->transportationType->description }} @endif </td>
                                            <td> @if(isset($request->cdcs->id)) {{ $request->cdcs->id . ' | ' . $request->cdcs->description }} @endif </td>
                                            <td> @if(isset($request->address->id)) {{ $request->address->id . ' | ' . $request->address->description }} @endif </td>
                                            <td>{{$request->indirizzo_scarico}}</td>
                                            <td>{{$request->cdcs->description}}</td>
                                            <td>{{$request->indirizzo_carico}}</td>
                                            @if(!empty($request->cdcs->description))
                                            <td>{{$request->cdcs->description}}</td>
                                            @else
                                            <td>N/A</td>
                                            @endif
                                          
                                            <td>
                                                <a href="{{route('travel_requests.edit',$request->id)}}" class=""><i
                                                            class="feather icon-edit" vx-tooltip
                                                            title="Modifica"></i></a>
                                                <form class="travelrequestform"
                                                      action="{{ route('travel_requests.destroy', $request->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="fabutton"><i class="feather icon-trash"></i></button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if(!empty($travelRequest))
                    <div class="row" style="padding: 10px;  margin: auto;">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <ul class="pagination">
                               
                                   
                              
                                   </li>{!! $travelRequest->render() !!}</li>
                              
                           </ul>
                       </div>
                   </div>
                   @endif
                </div>
            </div>
        </div>
    </section>
    <!--/ Zero configuration table -->
@endsection

@section('script')
    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/pdfmake.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('app-assets/js/scripts/datatables/datatable.js') }}"></script>
    <!-- END: Page JS-->

@endsection

