@extends('templates.backendTemplate')
@section('title')
	Register Client
@endsection
@section('customStyles')
<link href="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen" />

@endsection
@section('content')

<div class="row">
            <div class="col-md-12 ">
              <div class="grid simple form-grid">
                <div class="grid-title no-border">
                  <h4>Recieption<span class="semi-bold">Form</span></h4>
                   @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                  <form action="{{route('updateReceptionClient')}}" id="form_traditional_validation" method="POST" name="form_traditional_validation"  autocomplete="off" class="validate">
                    
                    @foreach($client as $k => $val)
                    {{csrf_field()}}
                    <div class="form-group">
                      <label class="form-label">Name</label><span class="help"></span>
                      <input class="form-control"   type="text" name="name" value="{{$val->name}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Email</label><span class="help"></span>
                      <input class="form-control"  type="email" name="email" value="{{$val->email}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Phone Number</label><span class="help"></span>
                      <input class="form-control"  type="number" name="phone_number" value="{{$val->phone_number}}" required>
                    </div>
                    <div class="col-md-4 form-group">
                      <div class="radio">
                        @if($val->gender == 'male' )
                        <input id="male" type="radio" name="gender" value="male" checked="checked">
                        <label for="male">Male</label>
                        <input id="female" type="radio" name="gender" value="female">
                        <label for="female">Female</label>
                        @else
                        <input id="male" type="radio" name="gender" value="male" >
                        <label for="male">Male</label>
                        <input id="female" type="radio" name="gender" value="female" checked="checked">
                        <label for="female">Female</label>
                        @endif
                      </div>
                    </div>
                    @endforeach
                    </div>
                    <div class="form-actions">
                      <div class="pull-right">
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                        <button class="btn btn-white btn-cons" type="button">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>  
	
@endsection
@section('customScripts')
<script src="{{URL('/')}}/backend/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{URL('/')}}/backend/assets/js/form_validations.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
@stop