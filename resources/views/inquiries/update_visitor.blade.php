
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
                  
                  <form action="{{route('updateVisitor')}}" id="form_traditional_validation" method="POST" name="form_traditional_validation"  autocomplete="off" class="validate">
                  	@foreach($visitor as $key => $val)
                    {{csrf_field()}}
                    <div class="form-group" style="display: none;">
                      <label class="form-label">Select type</label><span class="help"></span>
                      <select class="select_type" name="type">
                        <option value="Inquiry Calls"  @if($val->type=='Inquiry Calls')  selected @endif>Inquiry Calls</option>
                        <option value="Visitors Sheet"  @if($val->type=='Visitors Sheet')  selected @endif>Visitors Sheet</option>
                        <option value="Missed Called"  @if($val->type=='Missed Called')  selected @endif>Missed Called</option>
                        <option value="Facebook Messages"  @if($val->type=='Facebook Messages')  selected @endif>Facebook Messages</option>
                        <option value="Vcita Sheets" @if($val->type=='Vcita Sheets') selected @endif>Vcita Sheets</option>
                        <option value="Weber Sheets"  @if($val->type=='Weber Sheets')  selected @endif>Weber Sheets</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label><span class="help"></span>
                      <input class="form-control"   type="text" name="name" value="{{$val->name}}" required>
                    </div>

                    <div class="form-group" id="fb_msg" style="display: none">
                      <label class="form-label">Facebook Messege</label><span class="help"></span>
                      <input class="form-control"   type="text" name="fb_msg" value="{{$val->fb_msg}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Phone Number</label><span class="help"></span>
                      <input class="form-control"  type="number" name="phone_number" value="{{$val->phone_number}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Date</label><span class="help"></span>
                      <input class="form-control"  type="text" name="date" value="{{$val->date}}" readonly="readonly" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Status</label><span class="help"></span>
                      <input class="form-control"  type="text" name="status" value="{{$val->status}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Source</label><span class="help"></span>
                      <input class="form-control"  type="text" name="source" value="{{$val->source}}" required>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Area</label><span class="help"></span>
                      <input class="form-control"  type="text" name="area" value="{{$val->area}}" required>
                    </div>
                    <div class="form-group" id="hide_link" style="display: none">
                      <label class="form-label">Link From</label><span class="help"></span>
                      <select class="link_from" name="link_from">
                        <option value="">Select doctor</option>
                        @if($val->link_from == 'Dr. Farhan yaseen')
                        <option value="Dr. Farhan yaseen" selected="">Dr. Farhan yaseen</option>
                        <option value="Dr. Sarah Khan">Dr. Sarah Khan</option>
                        @elseif($val->link_from == 'Dr. Sarah Khan')
                        <option value="Dr. Farhan yaseen" >Dr. Farhan yaseen</option>
                        <option value="Dr. Sarah Khan" selected="">Dr. Sarah Khan</option>
                        @endif
                      </select>
                    </div>
                    <input type="hidden" name="id" value="{{$val->id}}">
                    <div class="col-md-4 form-group">
                      <div class="radio">
                      	@if($val->gender=='male')
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
                    </div>
                    <div class="form-actions">
                      <div class="pull-right">
                        <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Save</button>
                        <button href="{{route('updateVisitor',['id' => $val->id])}}"  class="btn btn-white btn-cons" type="button">Cancel</button>
                      </div>
                    </div>
                    @endforeach
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

      $(document).ready(function (){
          $('.select_type').change(function() {
          type=$('.select_type').val();
          if(type=='fm'){
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