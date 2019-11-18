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
<h2 class="content-header-title float-left mb-0">Datawarehouse</h2>
<div class="breadcrumb-wrapper col-12">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a>
</li>
<li class="breadcrumb-item active">Datawarehouse
</li>
</ol>
</div>
</div>
</div>
</div>
<div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
<a href="{{ route('datawarehouse.create') }}" class="btn btn-primary pull-right"> <i class="fa fa-plus"></i></a>
</div>
</div>
<!-- Zero configuration table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<h4 class="card-title">Datawarehouse</h4>


</div>
<div class="card-content">
<div class="card-body card-dashboard">
<p class="card-text">Gestione del Datawarehouse</p>
<div class="table-responsive">
    <table class="table table-sm zero-configuration">
        <thead>
        <tr>
            <th> <a href="#">ID </a>  </th>
            <th> <a href="#">ATI </a> </th>
            <th>  <a href="#">AGENT</a> </th>
            <!-- <th> <a href="#">Vehicle</a> </th> -->
            <th> <a href="#">fine</a>  </th>
            <th> <a href="#">DATA/ORA</a> </th>
            <!-- <th> <a href="#">DDT</a> </th> -->
            <th> <a href="#">FIRMA</a> </th>
            <!-- <th> <a href="#">SEGNALAZIONE</a> </th> -->
            <th> <a href="#">AZIONI</a> </th>


        </tr>
        </thead>
        <tbody>
            @foreach($data1 as $key => $data)
        <tr>
            <td>{{$data->id}}</td>
            <td>{{($data->atiId==null||empty($data->atiId))?'N/A':$data->ati->description}}</td>
            <td>{{($data->agentId==null||empty($data->agentId))?'N/A':$data->agent->description}}</td>
           
            <td>{{$data->fine}}</td>
            <td>{{$data->dataora}}</td>
            <td>{{$data->firma}}</td>
            <!-- <td>System Architect</td> -->
            <!-- <td>Edinburgh</td> -->


            <td>
                
                <a class="" href="{{route('datawarehouse.edit' , $data->id)}}"><i class="feather icon-edit"></i></a>

                <button class="fabutton"  data-toggle="modal" data-target="#confirm-delete{{$data->id}}">
                        <i class="feather icon-trash"></i>
                    </button>
                <!-- <a class=""><i class="feather icon-trash"></i></a> -->
            </td>
        </tr>
        <div class="modal fade" id="confirm-delete{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                           Do You Really Want to Delete?
                        </div>
                        <div class="modal-body">
                                <form action="{{route('datawarehouse.destroy', $data->id)}}" method="POST">

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

