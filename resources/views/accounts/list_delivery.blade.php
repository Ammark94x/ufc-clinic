@extends('templates.backendTemplate')
@section('title')
  TCS Delivery List
@endsection
@section('customStyles')
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
@section('content')
                    <ul class="breadcrumb">
            <li>
              <p>YOU ARE HERE</p>
            </li>
            <li><a href="#" class="active">Visitors</a> </li>
          </ul>
          <div class="page-title"> <i class="icon-custom-left"></i>
            <h3>List<span class="semi-bold">  Visitors</span></h3>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4>All <span class="semi-bold">Visitors</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                  @endif
                  <table class="table table-hover table-condensed" id="ufc_datatable">
                    <thead>
                      <tr>
                        <th style="width:10%">Date</th>
                        <th style="width:10%">Name</th>
                        <th style="width:6%">Area </th>
                        <th style="width:6%">Amount </th>
                        <th style="width:6%">Status </th>
                        <th style="width:6%">Package </th>
                        {{-- <th style="width:10%" data-hide="phone,tablet">Actions</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tcs as $key => $val)
                      <tr>
                        <td>{{$val->date}}</td>
                        <td><span class="muted"></span>{{$val->name}}</td>
                        <td><span class="muted"></span>{{$val->area}}</td>
                        <td><span class="muted"></span>{{$val->amount}}</td>
                        <td><span class="muted"></span>{{$val->status}}</td>
                        <td><span class="muted"></span>{{$val->package}}</td>
                        {{-- <td>
                          <div class="progress">
                            <div data-percentage="70%" class="progress-bar progress-bar-danger animate-progress-bar"></div>
                          </div>
                          <a href="{{route('editVisitor',['id' => $val->id])}}" class="btn btn-primary btn-xs btn-mini" ><i class="fa fa-paste"></i> Edit</a> 
                          <a href="{{route('deleteVisitor',['id' => $val->id])}}" class="btn btn-danger  btn-con btn-mini" ><i class="fa fa-times"></i> Delete</a>
                        </td> --}}
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection
@section('customScripts')
<script src="{{URL('/')}}/backend/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <!-- END PAGE LEVEL JS INIT -->
    {{-- <script src="{{URL('/')}}/backend/assets/js/datatables.js" type="text/javascript"></script> --}}
@stop