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
                    <h2 class="content-header-title float-left mb-0">Piani - Richieste</h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Piani - Richieste
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
            <a href="{{ route('plans_requests.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
        </div>
    </div>
    <!-- Zero configuration table -->
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Richiesta Piani</h4>


                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <p class="card-text">Pianifica urgenti, programmate ed in pronta disponibilità</p>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th> <a href="#">Id Pianifica</a> </th>
                                        <th> <a href="#">Data</a> </th>
                                        <th> <a href="#">Giro Pianificato</a>  </th>
                                        <th> <a href="#">Nome (Visibile da Palmare)</a> </th>
                                        <th><a href="#">Tappe</a> </th>
                                        <th> <a href="#">Note</a>  </th>
                                        <th> Vincolo Temp.</th>
                                        <th> Azioni </th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($planRequest as $request)
                                 
                                    <tr>
                                        <td>{{$request->id}}</td>
                                        <td>{{ date(" d/m/Y",strtotime($request->planDate))}}</td>
                                        <td>@if(isset($request->plan->description)) {{ $request->plan->id . ' | ' .$request->plan->description }} @endif</td>
                                        <td>{{$request->description}}</td>
                                        
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
                                       
                                        <td>{{$request->note}}</td>
                                        <td>{{$request->temperatureConstraintId}}</td>
                                        <td>
                                        <a href="{{route('plans_requests.edit',$request->id)}}" class=""><i
                                                            class="feather icon-edit" vx-tooltip
                                                            title="Modifica"></i></a>
                                                            <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$request->id}}">
                                                                    <i class="feather icon-trash"></i>
                                                                </button>
                                        </td>
                                     </tr>
                                     <div class="modal fade" id="confirm-delete{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                       Do You Really Want to Delete?
                                                    </div>
                                                    <div class="modal-body">
                                                            <form class="travelrequestform" action="{{ route('plans_requests.destroy', $request->id)}}" method="post">
                                                            @csrf
                                                    @method('DELETE')
                                                    </div>
                                                    <div class="modal-footer">
                                                           
                                                            <button type="submit" class="btn btn-danger btn-ok">Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    </div>
                                               
                                                </div>
                                            </div>
                                        </div>
                                     @endforeach
                                     </tfoot>
                                 </table>
                             </div>
                         </div>
                     </div>
                     @if(!empty($planRequest))
						 <div class="row" style="padding: 10px;  margin: auto;">
	                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                            <ul class="pagination">
	                            	
		                                
		                           
		                                </li>{!! $planRequest->render() !!}</li>
		                           
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

