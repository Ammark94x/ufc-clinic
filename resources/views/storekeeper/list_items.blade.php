@extends('templates.backendTemplate')
@section('title')
  Register Client
@endsection
@section('customStyles')    
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
@section('content')
                    <ul class="breadcrumb">
            <li>
              <p>YOU ARE HERE</p>
            </li>
            <li><a href="#" class="active">Item list</a> </li>
          </ul>
          <div class="page-title"> <i class="icon-custom-left"></i>
            <h3>StoreKeeper - <span class="semi-bold">Item List</span></h3>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4>List <span class="semi-bold">Clients</span></h4>
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
                  <table class="table table-hover table-condensed" id="example">
                    <thead>
                      <tr>
                        <th style="width:1%">
                          <div class="checkbox check-default" style="margin-right:auto;margin-left:auto;">
                            <input type="checkbox" value="1" id="checkbox1">
                            <label for="checkbox1"></label>
                          </div>
                        </th>
                        <th style="width:10%">Item Name</th>
                        <th style="width:15%" data-hide="phone,tablet">Item Quantity</th>
                        <th style="width:6%">Item Price </th>
                        @if(Auth::user()->role=='admin')
                        <th style="width:6%">Actions </th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($storekeeper as $key =>$items)
                      <tr>
                        <td>
                          <div class="checkbox check-default">
                            <input type="checkbox" value="3" id="checkbox3">
                            <label for="checkbox3"></label>
                          </div>
                        </td>
                        <td>{{$items->item_name}}{{-- <span class="label label-important">ALERT!</span> --}}</td> 
                        <td><span class="muted">{{$items->item_quantity}}</span></td>
                        <td><span class="muted">{{$items->item_price}}</span></td>
                        @if(Auth::user()->role=='admin')
                        <td>
                          <a href="{{route('edititem',['id' => $items->id])}}" class="btn btn-primary btn-xs btn-mini" ><i class="fa fa-paste"></i> Edit</a>
                          <a href="{{route('deleteItem',['id' => $items->id])}}" onclick="return confirm('Are you sure you want to remove item?');" class="btn btn-danger btn-times btn-mini" ><i class="fa fa-paste"></i> Delete</a>
                        </td>
                        @endif
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
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
@stop