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
                    <h2 class="content-header-title float-left mb-0">Equipment</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Equipment
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('equipment.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Equipment</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Gestione delle bippature/transazioni</p>
                            <div class="table-responsive">
                                <table class="table table-sm zero-configuration">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a> </th>
                                        <th> <a href="#">ddt@doc </a> </th>
                                        <th>  <a href="#">Days </a> </th>
                                        <th> <a href="#">Probe</a> </th>
                                        <th> <a href="#"> 	Barcode</a>  </th>
                                        <th> <a href="#">Vincolo Temp.</a> </th>
                                        <

                                        <th> <a href="#">	Azioni	</a> </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($equip))
                                    @foreach($equip as $key => $list)
                                        <tr>
                                        <td>{{$list->id}}</td>
                                        <td>{{$list->atiname->description}}</td>
                                        <td>{{$list->sanificationIntervalDays}}</td>
                                        <td>{{$list->probe->description}}</td>
                                        <td>{{$list->barcode}}</td>
                                        <td>{{$list->temperature->description}}</td>
                                        <!-- <td>$320,800</td>
                                        <td>#</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>2011/04/25</td> -->


                                        <td>
                                            <a class="" href="{{route('equipment.edit' , $list->id)}}"><i class="feather icon-edit"></i></a>
                                            
                                            <form action="{{route('equipment.destroy' , $list->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fabutton"><i class="feather icon-trash"></i></button>
                                            </form>
                                            <!-- <a class=""><i class="feather icon-trash"></i></a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                    <!-- <tr>
                                        <td>#</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>#</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>2011/04/25</td>


                                        <td>
                                            <a class=""><i class="feather icon-edit"></i></a>
                                            <a class=""><i class="feather icon-trash"></i></a>
                                        </td>
                                    </tr> -->

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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

