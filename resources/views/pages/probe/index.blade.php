@extends('layouts.app')

@section('style')
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/core/colors/palette-gradient.css') }}" >
    <!-- END: Page CSS-->
        <style type="text/css">
        .fabutton{
            background: none;
              padding: 0px;
              border: none;
        }
    </style>
@endsection

@section('content')
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Sonde</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Sonde
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('probe.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sonde</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Gestione del parco sonde</p>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a>  </th>
                                        <th> <a href="#">Ati </a> </th>
                                        <th>  <a href="#">Barcode </a> </th>
                                        <!-- <th> <a href="#">Nome</a> </th> -->
                                        <th> <a href="#"> Valida fino   </a>  </th>
                                        <!-- <th> <a href="#">  Tipo </a> </th> -->
                                        <th> <a href="#">Adibito a </a> </th>
                                        <th> <a href="#">Azioni</a> </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($listing as $key => $list)
                                        <tr>
                                            <td>{{$list->id}}</td>
                                            <td>{{$list->atiname->description}}</td>
                                            <td>{{$list->barcode}}</td>
                                            <td>{{date("d/m/Y H:i",strtotime($list->calibrationExpireTime))}}</td>
                                            <td>{{$list->usedFor}}</td>
                                            <td>
                                            <a class="" href="{{route('probe.edit' , $list->id)}}"><i class="feather icon-edit"></i></a>
                                            
                                            <form action="{{route('probe.destroy' , $list->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fabutton"><i class="feather icon-trash"></i></button>
                                            </form>
                                            <!-- <a class=""><i class="feather icon-trash"></i></a> -->
                                        </td>
                                        </tr>
                                        @endforeach
                                        
                                    

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    @if(!empty($listing))
                    <div class="row" style="padding: 10px;  margin: auto;">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <ul class="pagination">
                               
                                   
                              
                                   </li>{!! $listing->render() !!}</li>
                              
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