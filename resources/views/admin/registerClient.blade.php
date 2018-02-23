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
<?php 
  date_default_timezone_set('Asia/Karachi');
  $date = date('d/m/Y', time());
  
?>
  <div class="row">
            <div class="col-md-12">
              <div class="grid simple transparent">
                <div class="grid-title">
                  <h4>Register <span class="semi-bold">Client</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <div class="row">
                    <form id="commentForm" method="POST" action="{{route('store_patient')}}">
                      {{csrf_field()}}
                      <div id="rootwizard" class="col-md-12">
                        <div class="form-wizard-steps">
                          <ul class="wizard-steps">
                            <li class="" data-target="#step1">
                              <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Client Orientation Form</span> </a>
                            </li>
                            <li data-target="#step2" class="">
                              <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Medical History form</span> </a>
                            </li>
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="tab-content transparent">
                          <div class="tab-pane" id="tab1">
                            <br>
                            <h4 class="semi-bold">Step 1 - <span class="light">Basic Information</span></h4>
                            <br>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <br>
                            <div class="row form-row">
                              <div class="col-md-12">
                                <input type="text" placeholder="How did you came to know about us?" class="form-control no-boarder" name="data[about_us]" id="txtFullName">
                              </div>
                            </div>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input type="text" class="form-control" name="data[arrival_date]" value="{{$date}}" placeholder="Date">
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                              </div>
                              <div class="col-md-4">
                                 <div class="input-group transparent clockpicker col-md-6">
                              <input type="text" class="form-control" name="data[arrival_time]" value="" placeholder="Pick a time">
                              <span class="input-group-addon ">
                                <i class="fa fa-clock-o"></i>
                              </span>
                              </div> 
                              </div>
                              <div class="col-md-4">
                              <div class="input-append success date col-md-10 col-lg-6 no-padding">
                                <input type="text" class="form-control" name="data[next_visit]" placeholder="Next visit">
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                              </div>
                              </div>
                              <div class="col-md-4">
                                <input type="text" placeholder="Name" name="name" class="form-control no-boarder " id="txtLastName" required>
                              </div>
                              <div class="col-md-4">
                                <input type="text" placeholder="Father's/ Husband Name" name="f_name" class="form-control no-boarder " id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <input type="text" placeholder="Residential or Office Address" class="form-control no-boarder " name="address" id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Residential PTCL Number" name="res_phone" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <select id="source" style="width:100%" name="location" required="">
                                  <option value="">select city</option>
                                  @foreach($cities as $key => $city)
                                  <option value="{{$city->city}}">{{$city->city}}</option>
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Office PTCL Number" name="office_phone" class="form-control no-boarder " >
                              </div>

                              <div class="col-md-4">
                                <input type="text" placeholder="Mobile Number Ex:9231245678" required="" name="mobile" class="form-control no-boarder " required>
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Age" name="age" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="email" placeholder="Email" name="email"  class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <div class="radio">
                                  <input id="male" type="radio" name="gender" value="male" checked="checked">
                                  <label for="male">Male</label>
                                  <input id="female" type="radio" name="gender" value="female">
                                  <label for="female">Female</label>
                                </div>
                              </div>
                              <div class="col-md-2">
                                <input type="number" placeholder="height fit" name="data[height]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <input type="number" placeholder="inch" name="data[inch]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Actual Weight" name="data[actual_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="After BMR* Test" name="data[after_bmr_test]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Variation on weight" name="data[variation_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Ideal weight should be" name="data[ideal_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-12">
                                <textarea placeholder="Consultant Openion" name="data[consultant_openion]" class="form-control no-boarder" ></textarea> 
                              </div>
                              <div class="col-md-12">
                                <textarea placeholder="Why are you loosing weight" name="data[loosing_Weight]" class="form-control no-boarder" ></textarea> 
                              </div>
                              <span class="btn btn-success" id="view_bmr">Add BMR</span>
                              <div class="bmr" style="display: none;">{{-- Hiding bmr  --}}
                                <div class="col-md-16">
                                  
                                  <h3>Measurements</h3>
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="NECK" name="measurment[neck]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="Waist" name="measurment[waist]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="CHEST" name="measurment[chest]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="SIDE BUNS" name="measurment[side_buns]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="After BMR* Test" name="measurment[after_bmr_test]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="HIPS" name="measurment[hips]" class="form-control no-boarder " >
                                </div>
                                <div class="col-md-4">
                                  <input type="number" placeholder="THIGH" name="measurment[thies]" class="form-control no-boarder " >
                                </div>  
                                <div class="col-md-4">
                                  <input type="number" placeholder="ARMS" name="measurment[arms]" class="form-control no-boarder " >
                                </div>
                              </div>  
                            </div>
                          </div>
                          <div class="tab-pane" id="tab2">
                            <br>
                            <h4 class="semi-bold">Step 2 - <span class="light">Medical History Form</span></h4>
                            <br>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <input type="text" placeholder="Name" name="history[name]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <input type="number" placeholder="Age" name="history[age]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <input type="text" placeholder="profession" name="history[profession]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4" class="form-control no-boarder" placeholder="profession" >
                                <select id="diesease" style="width:100%" name="history[disease_status]">
                                  <option value="">Do you have any disease?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-6" id="disease">
                                <input type="text" placeholder="Enter disease" name="history[disease]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <select id="source" style="width:100%" name="history[martial_status]">
                                  <option value="">Please select Marital Status</option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Widow">Widow</option>
                                  <option value="Divorced">Divorced</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <input type="number" placeholder="Year" name="history[year]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <select id="source" style="width:100%" name="history[childrens_numbers]">
                                  <option value="">Please Number of Childrens</option>
                                  <option value="One">One</option>
                                  <option value="Two">Two</option>
                                  <option value="Three">Three</option>
                                  <option value="Four">Four</option>
                                  <option value="Five">Five</option>
                                  <option value="Six">Six</option>
                                  <option value="Seven">Seven</option>
                                  <option value="Eight">Eight</option>
                                </select>
                              </div>
                              <div class="col-md-4" class="form-control no-boarder"  placeholder="profession" >
                                <select  style="width:100%" name="history[over_weight]">
                                  <option value="">Any child is over weight?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[dnc]" >{{-- id="miscarriage" --}}
                                  <option value="">Any DNC or miscarriage?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%"  name="history[delivery_type]"  id="miscarriage_type">
                                  <option value="">Delivery BY</option>
                                  <option value="Normal">Normal</option>
                                  <option value="C-Section">C-Section</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[allergy]">
                                  <option value="">Any allergy?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[surgery]" id="surgery">
                                  <option value="">Any surgery?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                  <input type="text" placeholder="please add surgery reason" name="history[surgery_reason]" class="form-control" id="surgery_reason">
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[diabetic]">
                                  <option value="">Any diabetic person at home?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[hyper_tension]">
                                  <option value="">Any hyper tension person at home?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  style="width:100%" name="history[anemic]">
                                  <option value="">Are you Anemic?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select  id="smoke" style="width:100%" name="history[smoke]">
                                  <option value="">Do you smoke?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                               <div class="col-md-4"  id="smoking" >
                                <select  id="smoke" style="width:100%" name="history[smoking]">
                                  <option value="">Quantity of smoking</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                  <option value="7">7</option>
                                  <option value="8">8</option>
                                  <option value="9">9</option>
                                  <option value="10">10</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select style="width:100%" name="history[alcoholic_drink]">
                                  <option value="">Do you take alcoholic drinks?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select style="width:100%" name="history[extra_drugs]">
                                  <option value="">Do you use any extra drugs?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <select   id="medication" style="width:100%" name="history[medication]">
                                  <option value="">Are you currently under any medication?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <input type="text" placeholder="Please description your medication" name="history[medication_reason]" id="medication_reason">
                              </div>
                              <div class="col-md-6">
                                
                                <select   style="width:100%" name="history[menstrual_history]">
                                  <option value="">Please specify menstrual history</option>
                                  <option value="Regular">Regular</option>
                                  <option value="Irregular">Irregular</option>
                                  <option value="Menopause">Menopause</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <input type="text" placeholder="Days" name="history[Days]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <input type="text" placeholder="frequency" name="history[frequency]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <input type="text" placeholder="type" name="history[type]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <input type="text" placeholder="color" name="history[color]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6">
                                <select   style="width:100%" id="dieting" name="history[did_diet]">
                                  <option value="">Did you ever diet?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                              <div class="col-md-6" id="diet">
                                <input type="text" placeholder="How long did you kept on diet" name="history[how_long_diet]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6" id="diet">
                                <input type="text" placeholder="How much did you loose?" name="history[how_much_loose]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-12">
                                <select style="width:100%" name="history[regain_weight]">
                                  <option value="">Did you regain your weight once you stopped the dieting process?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                               <div class="col-md-12">
                                <select style="width:100%" name="history[physical_exercise]">
                                  <option value="">Did you physical exersice?</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <ul class=" wizard wizard-actions">
                            <li class="previous first" style="display:none;"><a href="javascript:;" class="btn">&nbsp;&nbsp;First&nbsp;&nbsp;</a></li>
                            {{-- <li class="previous"><a href="javascript:;" class="btn">&nbsp;&nbsp;Previous&nbsp;&nbsp;</a></li> --}}
                            <li class="next last" style="display:none;"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Last&nbsp;&nbsp;</a></li>
                            <li class="next"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Next&nbsp;&nbsp;</a></li>
                            <li class="next"><input type="submit" class="btn btn-success" value="Submit"></li>
                          </ul>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  
@endsection
@section('customScripts')
<script src="{{URL('/')}}/backend/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{URL('/')}}/backend/assets/js/form_validations.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.js" type="text/javascript"></script>


    <!-- Hide disease input -->
    <script type="text/javascript">
      $('#disease').hide(); 
    </script>


    <!-- Hide smoking input -->
    <script type="text/javascript">
      $('#smoking').hide(); 
    </script>


    <!-- Hide smoking input -->
    <script type="text/javascript">
      $('#diet').hide(); 
    </script>


    <script type="text/javascript">
      $('.input-append.date').datepicker({
        autoclose: true,
        todayHighlight: true
     });
    </script>


    <script type="text/javascript">
      //Time pickers
  $('.clockpicker ').clockpicker({
        autoclose: true
    });
    </script>


    <!-- Input show/hide disease -->
    <script type="text/javascript">
      $('#diesease').change(function (){
        disease_status=this.value;
        if(disease_status == 1 ){
          $('#disease').show('slow');
        }else{
          $('#disease').hide('slow');
        }
      });
    </script>


    <!-- Input show/hide smoking -->
    <script type="text/javascript">
      $('#smoke').change(function (){
        smoke=this.value;
        if(smoke == 1 ){
          $('#smoking').show('slow');
        }else{
          $('#smoking').hide('slow');
        }
      });
    </script>


    <!-- Input show/hide dieiting -->
    <script type="text/javascript">
      $('#dieting').change(function (){
        diet=this.value;
        if(diet == 1 ){
          $('#diet').show('slow');
        }else{
          $('#diet').hide('slow');
        }
      });
    </script>

    <!--  show/hide BMR -->
    <script type="text/javascript">
      $(document).on('click','#view_bmr',function (){
        $('.bmr').toggle('slow');
      });
    </script>

    {{-- show miscarriage type --}}
    <script type="text/javascript">
      $('#miscarriage').change(function (){
        miscarriage=this.value;
        if(miscarriage == 1 ){
          $('#miscarriage_type').show('slow');
        }else{
          $('#miscarriage_type').hide('slow');
        }
      });
    </script>

    {{-- show medication --}}
    <script type="text/javascript">
      $('#medication').change(function (){
        medication=this.value;
        if(medication == 1 ){
          $('#medication').show('slow');
        }else{
          $('#medication').hide('slow');
        }
      });
    </script>
    {{-- surgery reason --}}
    <script type="text/javascript">
      $('#surgery').change(function (){
        surgery=this.value;
        if(surgery == 1 ){
          $('#surgery_reason').show('slow');
        }else{
          $('#surgery_reason').hide('slow');
        }
      });
    </script>
    {{-- medication reason --}}
    <script type="text/javascript">
      $('#medication_reason').change(function (){
        medication_reason=this.value;
        if(medication_reason == 1 ){
          $('#medication_reason_reason').show('slow');
        }else{
          $('#medication_reason_reason').hide('slow');
        }
      });
    </script>
@stop