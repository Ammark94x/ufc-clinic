@extends('templates.backendTemplate')
@section('title')
  Add TCS Deivery
@endsection
@section('customStyles')
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
@section('content')

<div class="row">
            <div class="col-md-12 ">
              <div class="grid simple form-grid">
                <div class="grid-title no-border">
                  <h4>TCS<span class="semi-bold">Form</span></h4>
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
                  <form action="{{route('insertDelivery')}}" id="form_traditional_validation" method="POST" name="form_traditional_validation"  autocomplete="off" class="validate">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label class="form-label">Date</label><span class="help"></span>
                      <input class="form-control"  type="date" name="date" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label><span class="help"></span>
                      <input class="form-control"  type="text" name="name" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Area</label><span class="help"></span>
                      <input class="form-control"  type="text" name="area" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Amount</label><span class="help"></span>
                      <input class="form-control"  type="number" name="amount" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Package</label><span class="help"></span>
                      <select name="package" required="">
                        <option value="">Select package</option>
                        <option value="OLD/NEW">OLD/NEW</option>
                        <option value="Regular">Regular</option>
                        <option value="OLD">OLD</option>
                        <option value="NEW">NEW</option>
                      </select> 
                    </div>
                    <div class="form-group">
                      <label class="form-label">Status</label><span class="help"></span>
                      <select name="status" required="">
                        <option value="">Select status</option>
                        <option value="Recieved">Recieved</option>
                        <option value="Return">Return</option>
                        <option value="Next Month">Next Month</option>
                      </select> 
                    </div>
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
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{URL('/')}}/backend/assets/js/form_validations.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
@stop