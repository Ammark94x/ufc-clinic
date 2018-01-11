@extends('templates.backendTemplate')
@section('title')
  Next Visits
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
            <li><a href="#" class="active">Visits Tomorrow</a> </li>
          </ul>
          <div class="page-title"> <i class="icon-custom-left"></i>
            <h3>Visits - <span class="semi-bold">Tomorrow</span></h3>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4>All <span class="semi-bold">Visits</span></h4>
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
                        <th style="width:10%">Name</th>
                        {{-- <th style="width:15%" data-hide="phone,tablet">Emails</th> --}}
                        <th style="width:6%">Date of visit </th>
                        <th style="width:6%">Mobile </th>
                        <th style="width:10%" data-hide="phone,tablet">Notify</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($data as $key => $value)
                      <tr>
                        <td>{{App\User::find($value->user_id)['name']}}</td>
                        <td>{{$value->date}}</td>
                        <td>{{App\User::find($value->user_id)['mobile']}}</td>
                        <td><input type="checkbox" name=""></td>
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