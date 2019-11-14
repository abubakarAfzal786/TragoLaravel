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
                    <h2 class="content-header-title float-left mb-0">Piani - Palmare</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Piani - Palmare
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('plans_handheld.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Piani - Palmare </h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Viaggi a Richiesta pianificati da palmare</p>
                            <div class="table-responsive">
                                <table class="table table-sm zero-configuration">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id </a>  </th>
                                        <th> <a href="#">PlanHash </a> </th>
                                        <th>  <a href="#">Data </a> </th>
                                        <th> <a href="#">Giro Pianificato</a> </th>
                                        <th> <a href="#">Nome</a>  </th>
                                        <th> <a href="#">Note </a> </th>
                                        <th> <a href="#">Da Ora	 </a> </th>
                                        <th> <a href="#">A Ora</a> </th>
                                        <th> <a href="#">Durata</a> </th>
                                        <th> <a href="#">Tappe</a> </th>
                                        <th> <a href="#">Azioni	</a> </th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                  @foreach($planHandheld as $planHand)
                                    <tr>
                                        <td>{{$planHand->id}}</td>
                                        <td>{{$planHand->planTypeId}}</td>
                                        <td>{{$planHand->planDate}}</td>
                                        <td>{{$planHand->planId}}</td>
                                        <td>{{$planHand->description}}</td>
                                        <td>{{$planHand->note}}</td>
                                        <td>{{$planHand->planTimeFrom}}</td>
                                        <td>{{$planHand->planTimeTo}}</td>
                                        <td>
                                        @if($request->places_json)
                                       
                                        <ul>
                                            @foreach(jsoon_data($request->places_json) as $data)
                                             <?php
  if($data->addressId){                              
$name=DB::table('addresses')->where('id',$data->addressId)->first();

?>
                                            
                                            
                                            <li> {{$data->dateTime}} {{$name->description}} {{$data->dateTime}}</li> 
                                            
<?php
}
?>
                                           
                                           
                                            
                                            @endforeach
                                            </ul> 
                                   @endif
                                   </td>
                                        <td>{{$planHand->places_json}} </td>

                                        <td>
                                            <a   href="{{route('plans_handheld.edit',$planHand->id)}}" class=""><i class="feather icon-edit"></i></a>
                                            <form class="formHidden" action="{{ route('plans_handheld.destroy', $planHand->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a class="planHandheldrequest" href="#" ><i class="feather icon-trash"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach

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

