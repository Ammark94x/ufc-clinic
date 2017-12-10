@extends('templates.backendTemplate')
@section('title','Utilities')
@section('customStyles')
@endsection
@section('content')
<div class="page-title">
<h3>Utility</h3>
<a href="{{route('createUtility')}}" class="btn btn-success pull-right">Add Utility</a>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <h4>Utility List</h4>      
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <table class="table" id="ufc_table">
        <thead>
          <tr>
            <th>Utility</th>
            <th>Month</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $value)
          <tr>
            <td>{{$value->expense}}</td>
            <td>{{date("M",strtotime($value->date))}}</td>
            <td>{{$value->amount}}</td>
            <td><a href="{{route('deleteExpense',$value->id)}}" class="btn btn-danger btn-xs">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@section('customScripts')
@endsection