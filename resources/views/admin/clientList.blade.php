@extends('templates.backendTemplate')
@section('title')
  Register Client
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
            <li><a href="#" class="active">Clients</a> </li>
          </ul>
          <div class="page-title"> <i class="icon-custom-left"></i>
            <h3>Clients - <span class="semi-bold">List</span></h3>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4>All <span class="semi-bold">Clients</span></h4>
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
                  <table class="table table-hover table-condensed" id="ufc_table">
                    <thead>
                      <tr>
                        <th style="width:1%">
                          <div class="checkbox check-default" style="margin-right:auto;margin-left:auto;">
                            <input type="checkbox" value="1" id="checkbox1">
                            <label for="checkbox1"></label>
                          </div>
                        </th>
                        <th style="width:10%">Name</th>
                        {{-- <th style="width:15%" data-hide="phone,tablet">Emails</th> --}}
                        <th style="width:6%">Date of visit </th>
                        <th style="width:6%">Mobile </th>
                        <th style="width:6%">Location </th>
                        <th style="width:10%" data-hide="phone,tablet">Progress</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($user as $key =>$val)
                      <tr>
                        <td>
                          <div class="checkbox check-default">
                            <input type="checkbox" value="3" id="checkbox3">
                            <label for="checkbox3"></label>
                          </div>
                        </td>
                        <td>{{$val->name}}{{-- <span class="label label-important">ALERT!</span> --}}</td>
                        {{-- <td><span class="muted">{{$val->email}}</span></td> --}}
                        <td><span class="muted">{{ json_decode($val->meta->data,true)['arrival_date']}}</span></td>
                        <td><span class="muted">{{$val->mobile}}</span></td>
                        <td><span class="muted">{{$val->location}}</span></td>
                        <td>
                          {{-- <div class="progress">
                            <div data-percentage="70%" class="progress-bar progress-bar-danger animate-progress-bar"></div>
                          </div> --}}
                          <a href="{{route('editClient',['id' => $val->id])}}" class="btn btn-primary btn-xs btn-mini" ><i class="fa fa-paste"></i> Edit</a> 
                          <a href="{{route('deleteClient',['user_id' => $val->id])}}" class="btn btn-danger  btn-con btn-mini" ><i class="fa fa-times"></i> Delete</a>
                          <a href="{{route('monitorClient',['user_id' => $val->id])}}" class="btn btn-primary  btn-con btn-mini" ><i class="fa fa-times"></i> Monitor</a>
                        </td>
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