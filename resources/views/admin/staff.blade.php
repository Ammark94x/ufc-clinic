@extends('templates.backendTemplate')
@section('title','Add Staff')
@section('customStyles')
@endsection
@section('content')
<div class="page-title">
<h3>Staff</h3>
<a href="{{route('staff.create')}}" class="btn btn-success pull-right">Add Staff</a>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <h4>Staff List</h4>      
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <table class="table" id="datatable">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td><a href="{{url('staff/'.$user->id.'/delete')}}" class="btn btn-danger btn-xs">Delete</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
</div>
@endsection
@section('customScripts')
@endsection