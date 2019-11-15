@extends('layouts.app')

@section('style')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}" >
    <!-- END: Page CSS-->
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Piani</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Piani
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('plans.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Piani</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Gestione dei piani permanenti</p>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a>  </th>
                                        <th> <a href="#">Ati </a> </th>
                                        <th>  <a href="#">Name </a> </th>
                                        <th> <a href="#">Annotazioni</a> </th>
                                        <th> <a href="#">Calendario Settimanale </a>  </th>
                                        <th> <a href="#">Vincolo Temp. </a> </th>
                                        <th> <a href="#">Tappe </a> </th>
                                        {{-- <th>  <a href="#">Variazioni Pianificate</a></th> --}}
                                        <th> 	<a>Azioni </a> </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($plan as $request)
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{$request->ati->description}}</td>
                                        <td>{{$request->description}}</td>
                                        <td>{{$request->note}}</td>
                                        <td>{{$request->weekdays_json}}</td>
                                       
                                        <td>{{$request->temperatureConstraintId}}</td>
                                                           
               
                                                           
                                      @if($request->plansCustoms)
                                        <td>{{$request->plansCustoms}}</td>
                                        @else
                                        <td>N\A</td>
                                        @endif
                                        <td>
                                            <a href="{{route('plans.edit',$request->id)}}" class=""><i
                                                class="feather icon-edit" vx-tooltip
                                                title="Modifica"></i></a>
                                    <form class="travelrequestform"
                                          action="{{ route('plans.destroy', $request->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="fabutton">
                                            <i class="feather icon-trash"
                                                                             data-toggle-tooltip
                                                                             title="Elimina"></i>
                                        </button>
                                    </form>
                                    </td>
                                    </tr>
                                    @endforeach
                                    </tr>
                                    </td>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if(!empty($plan))
                    <div class="row" style="padding: 10px;  margin: auto;">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <ul class="pagination">
                               
                                   
                              
                                   </li>{!! $plan->render() !!}</li>
                              
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

