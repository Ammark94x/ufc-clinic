@extends('templates.backendTemplate')
@section('title')
  Register Client
@endsection
@section('customStyles')    
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
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
                  <table class="table" id="ufc_table">
                    <thead>
                      <tr>
                        <th style="width:10%">Item Name</th>
                        <th style="width:6%">Actions </th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($storekeeper as $key =>$items)
                      <tr>
                        <td>{{$items->item_name}}{{-- <span class="label label-important">ALERT!</span> --}}</td>
                        
                        <td>
                          <a href="{{route('edititem',['id' => $items->id])}}" class="btn btn-primary btn-xs btn-mini" ><i class="fa fa-paste"></i> Edit</a>
                          @if(Auth::user()->role=='admin')
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
@stop