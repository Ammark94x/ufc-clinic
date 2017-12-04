@extends('templates.backendTemplate')
@section('title','Add Staff')
@section('customStyles')
@endsection
@section('content')
<ul class="breadcrumb">
    <li>
      <p>Staff</p>
    </li>
		<li><a href="#" class="active">Add Staff Member</a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
<h3>Add <span class="semi-bold">Staff</span></h3>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <h4>Staff <span class="semi-bold">Details</span></h4>
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <br>
      <form action="{{route('staff.store')}}" method="POST">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="form-label">Name</label>
            <div class="controls">
            	{{csrf_field()}}
              <input type="text" class="form-control" name="name" required>
              @if ($errors->has('name'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('name') }}</strong>
	                </span>
	            @endif
            </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="form-label">Email</label>
            <div class="controls">
              <input type="email" name="email" class="form-control" required>
              @if ($errors->has('email'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
            </div>
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="form-label">Password</label>
            <div class="controls">
              <input type="password" class="form-control" name="password" required>
              @if ($errors->has('password'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	            @endif
            </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">Role</label>
            <div class="controls">
              <select name="role" class="form-control" required>
              	<option value="">Select Role</option>
	            <option value="receptionist">Receptionist</option>
	            <option value="consultant">Consultant</option>
	            <option value="storekeeper">Storekeeper</option>
              <option value="account">Account</option>
              <option value="storekeeper">Call Center</option>
	          </select>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<input type="submit" value="Add Staff" class="btn btn-primary pull-right">
    	</div>
    </div>
	</form>
  </div>
</div>
@endsection
@section('customScripts')
@endsection