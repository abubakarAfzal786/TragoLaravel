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
<h2 class="content-header-title float-left mb-0">Transaction</h2>
<div class="breadcrumb-wrapper col-12">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">Transaction
    </li>
</ol>
</div>
</div>
</div>
</div>
<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
<a href="{{ route('transaction.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
</div>
</div>
<!-- Zero configuration table -->
<section>
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Transaction</h4>


</div>
<div class="card-content">
<div class="card-body card-dashboard">
    <p class="card-text">Gestione delle transazioni</p>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
            <tr>
                <th> <a href="#">Id </a>  </th>
                <th> <a href="#">Ati </a> </th>
                <th>  <a href="#">Plan </a> </th>
                <th> <a href="#">		Type</a> </th>
                <!-- <th> <a href="#"> 	Address	</a>  </th> -->
                <th> <a href="#">	Cdc </a> </th>
                <th> <a href="#">Time </a> </th>
                <th> <a href="#">	docId</a> </th>
                <th> <a href="#">	ddtId	</a> </th>
                <th> <a href="#">	Azioni	</a> </th>


            </tr>
            </thead>
            <tbody>
                @foreach($trans as $key => $val)

                    <tr>
                <td>{{$val->id}}</td>
                <td>{{$val->ati->description}}</td>
                <td>{{$val->plan->description}}</td>
                <td>{{$val->type->description}}</td>
               <!--  <td>
                    {{($val->placeId == null || empty($val->placeId) || $val->placeId == ' ')? 'N/A' : $val->place['addressAddress']}}

                    </td> -->
                <td>{{($val->cdcId == null || empty($val->cdcId) || $val->cdcId == '')? 'N/A' : $val->cdc->description}}</td>
                <td>{{$val->time}}</td>
                <td>{{$val->docId}}</td>
                <td>{{$val->ddtId}}</td>


                <td>
                    
                    <a class="" href="{{route('transaction.edit' , $val->id)}}"><i class="feather icon-edit"></i></a>
                    
                    <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$val->id}}">
                            <i class="feather icon-trash"></i>
                        </button>
                    <!-- <a class=""><i class="feather icon-trash"></i></a> -->
                </td>
            </tr>
            <div class="modal fade" id="confirm-delete{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                               Do You Really Want to Delete?
                            </div>
                            <div class="modal-body">
                                <form class="travelrequestform" action="{{ route('transaction.destroy', $val->id)}}" method="post">
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
@if(!empty($trans))
                    <div class="row" style="padding: 10px;  margin: auto;">
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           <ul class="pagination">
                               
                                   
                              
                                   </li>{!! $trans->render() !!}</li>
                              
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

