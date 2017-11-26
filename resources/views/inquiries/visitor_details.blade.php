@extends('templates.backendTemplate')
@section('title')
	Register Client
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
                  <h4>Form<span class="semi-bold"></span></h4>

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
                  <a href="{{route('listVisitors')}}" class="btn btn-success pull-right">View visitors</a>
                  <form action="{{route('addVisitor')}}" id="form_traditional_validation" method="POST" name="form_traditional_validation"  autocomplete="off" class="validate">
                    {{csrf_field()}}
                    <div class="form-group">
                      <label class="form-label">Select type</label><span class="help"></span>
                      <select class="select_type" name="type">
                        <option value="Inquiry Calls">Inquiry Calls</option>
                        <option value="Visitors Sheet">Visitors Sheet</option>
                        <option value="Missed Called">Missed Called</option>
                        <option value="Facebook Messages">Facebook Messages</option>
                        <option value="Vcita Sheets">Vcita Sheets</option>
                        <option value="Weber Sheets">Weber Sheets</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label><span class="help"></span>
                      <input class="form-control"   type="text" name="name" required>
                    </div>
                    <div class="form-group" id="fb_msg" style="display: none">
                      <label class="form-label">Facebook Messege</label><span class="help"></span>
                      <input class="form-control"   type="text" name="fb_msg" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Phone Number</label><span class="help"></span>
                      <input class="form-control"  type="number" name="phone_number" required>
                    </div>
                    <?php 
                      date_default_timezone_set('Asia/Karachi');
                      $date=date('d-m-Y');
                    ?>
                    <div class="form-group">
                      <label class="form-label">Date</label><span class="help"></span>
                      <input class="form-control"  type="text" name="date" value="{{$date}}" readonly="readonly" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Status</label><span class="help"></span>
                      <input class="form-control"  type="text" name="status" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Source</label><span class="help"></span>
                      <input class="form-control"  type="text" name="source" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Area</label><span class="help"></span>
                      <input class="form-control"  type="text" name="area" required>
                    </div>
                    <div class="form-group" id="hide_link" style="display: none">
                      <label class="form-label">Link From</label><span class="help"></span>
                      <select class="link_from" name="link_from">
                        <option value="">Select doctor</option>
                        <option value="Dr. Farhan yaseen">Dr. Farhan yaseen</option>
                        <option value="Dr. Sarah Khan">Dr. Sarah Khan</option>
                      </select>
                    </div>
                    <div class="col-md-4 form-group">
                      <div class="radio">
                        <input id="male" type="radio" name="gender" value="male" checked="checked">
                        <label for="male">Male</label>
                        <input id="female" type="radio" name="gender" value="female">
                        <label for="female">Female</label>
                      </div>
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
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{URL('/')}}/backend/assets/js/form_validations.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function (){
          $('.select_type').change(function() {
          type=$('.select_type').val();
          if(type=='Facebook Messages'){
            $('#fb_msg').show('slow');
          }else{
            $('#fb_msg').hide('slow');
          }
          if(type =='vcs'){
            $('#hide_link').show('slow');
          }else{
            $('#hide_link').hide('slow');
          }
        });
      });
    </script>
@stop