@extends('templates.backendTemplate')
@section('title','Add Staff')
@section('customStyles')
@endsection
@section('content')
<ul class="breadcrumb">
    <li>
      <p>Profile</p>
    </li>
		<li><a href="#" class="active">Change Password</a> </li>
</ul>
<div class="grid simple">
    <div class="grid-title no-border">
      <h4>Change <span class="semi-bold">Password</span></h4>
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <br>
      <form action="{{url('/staff/update-password')}}" method="POST">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group{{ Session::has('current_password') ? ' has-error' : '' }}">
            <label class="form-label">Current Password</label>
            <div class="controls">
              {{csrf_field()}}
              <input type="password" class="form-control" name="current_password" required>
              @if (Session::has('current_password'))
                  <span class="help-block">
                      <strong>{{ Session::get('current_password') }}</strong>
                  </span>
              @endif
            </div>
          </div>
      </div>
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="form-label">New Password</label>
            <div class="controls">
            	{{csrf_field()}}
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
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label class="form-label">Confirm Password</label>
            <div class="controls">
              <input type="password" name="password_confirmation" class="form-control" required>
              @if ($errors->has('password_confirmation'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password_confirmation') }}</strong>
	                </span>
	            @endif
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