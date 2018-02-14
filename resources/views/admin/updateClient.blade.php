@extends('templates.backendTemplate')
@section('title')
  Register Client
@endsection
@section('css')
<link href="{{URL('/')}}/backend/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{URL('/')}}/backend/assets/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">
    <!-- END PLUGIN CSS -->
    <!-- BEGIN PLUGIN CSS -->
    <link href="{{URL('/')}}/backend/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL('/')}}/backend/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{URL('/')}}/backend/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')

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
                    <form id="commentForm" method="POST" action="{{route('updateClient')}}">
                      {{csrf_field()}}
                      @foreach($data as $key => $val)
                      <div id="rootwizard" class="col-md-12">
                        <div class="form-wizard-steps">
                          <ul class="wizard-steps">
                            <li class="" data-target="#step1">
                              <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Client Orientation Form</span> </a>
                            </li>
                            <li data-target="#step2" class="">
                              <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Medical History form</span> </a>
                            </li>
                            <li data-target="#step3" class="">
                              <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Monitor</span> </a>
                            </li>
                            <li data-target="#step4" class="">
                              <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Today's Monitoring Detail</span> </a>
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
                                <label>How did you cameto know about us?</label>
                                <input type="text" placeholder="How did you came to know about us?" class="form-control no-boarder" name="data[about_us]" value="{{json_decode($data[$key]['data'])->about_us}}" id="txtFullName">
                              </div>
                            </div>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <label>Arrival date</label>
                                <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input type="text" class="form-control" name="data[arrival_date]" value="{{json_decode($data[$key]['data'])->arrival_date}}" placeholder="Date">
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                              </div>
                              <input type="hidden" name="metaUserId" value="{{$user_id}}">
                              <div class="col-md-4">
                                <label>Arrival time</label>
                                 <div class="input-group transparent clockpicker col-md-6">
                              <input type="text" class="form-control" name="data[arrival_time]" value="{{json_decode($data[$key]['data'])->arrival_time}}" placeholder="Pick a time">
                              <span class="input-group-addon ">
                                <i class="fa fa-clock-o"></i>
                              </span>
                            </div>
                                
                              </div>
                               <div class="col-md-4">
                                <label>Next visit</label>
                            <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input type="text" class="form-control" name="data[next_visit]" value="{{json_decode($data[$key]['data'])->next_visit}}" placeholder="Next visit">
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                              </div>
                              @foreach($user as $user => $user_data)
                              <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" placeholder="Name" name="name"   value="{{$user_data->name}}" class="form-control no-boarder " id="txtLastName" required>
                              </div>
                              <div class="col-md-4">
                                <label>Father name/Guardian name</label>
                                <input type="text" placeholder="Father's/ Husband Name" name="f_name"  value="{{$user_data->f_name}}" class="form-control no-boarder " id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <label>Residential or office address</label>
                                <input type="text" placeholder="Residential or Office Address"  value="{{$user_data->address}}" class="form-control no-boarder " name="address" id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <label>Residential ptcl number</label>
                                <input type="number" placeholder="Residential PTCL Number" name="res_phone"  value="{{$user_data->res_phone}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <select id="source" style="width:100%" name="location">
                                  <option value="">select city</option>
                                  @foreach($cities as $vall => $city)
                                  @if($user_data->location == $city->city )
                                  <option value="{{$city->city}}" selected="">{{$city->city}}</option>
                                  @else
                                  <option value="{{$city->city}}" >{{$city->city}}</option>
                                  @endif
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Office ptcl number</label>
                                <input type="number" placeholder="Office PTCL Number" name="office_phone"  value="{{$user_data->office_phone}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Mobile</label>
                                <input type="text" placeholder="Mobile Number Ex:9231245678" name="mobile"  value="{{$user_data->mobile}}" class="form-control no-boarder " required>
                              </div>
                              <div class="col-md-4">
                                <label>Age</label>
                                <input type="number" placeholder="Age" name="age"  value="{{$user_data->age}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Email</label>
                                <input type="email" placeholder="Email" name="email" required  value="{{$user_data->email}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Gender</label>
                                <div class="radio">
                                  @if($user_data->gender == 'male')
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
                              <div class="col-md-2">
                                <label>Height fit</label>
                                <input type="number" placeholder="height fit" name="data[height]" value="{{json_decode($data[$key]['data'])->height}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <label>Inch</label>
                                <input type="number" placeholder="inch" name="data[inch]" value="{{json_decode($data[$key]['data'])->height}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Actual weight</label>
                                <input type="number" placeholder="Actual Weight" value="{{json_decode($data[$key]['data'])->actual_weight}}" name="data[actual_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>After BMR* test</label>
                                <input type="number" placeholder="After BMR* Test" value="{{json_decode($data[$key]['data'])->after_bmr_test}}" name="data[after_bmr_test]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Variation on weight</label>
                                <input type="number" placeholder="Variation on weight" value="{{json_decode($data[$key]['data'])->variation_weight}}" name="data[variation_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Ideal weight should be</label>
                                <input type="number" value="{{json_decode($data[$key]['data'])->ideal_weight}}" placeholder="Ideal weight should be" name="data[ideal_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-8">
                                <label>Consultant Openion</label>
                                <textarea placeholder="Consultant Openion" name="data[consultant_openion]"  class="form-control no-boarder" >{{json_decode($data[$key]['data'])->consultant_openion}}</textarea> 
                              </div>
                              <div class="col-md-12">
                                <label>Why are you loosing weight</label>
                                <textarea placeholder="Why are you loosing weight"  name="data[loosing_Weight]" class="form-control no-boarder" >{{json_decode($data[$key]['data'])->loosing_Weight}}</textarea> 
                              </div>
                              <h3>Measurements</h1><br>
                              <div class="col-md-4">
                                <label>NECK</label>
                                <input type="number" placeholder="NECK" value="{{json_decode($data[$key]['measurment'])->neck}}" name="measurment[neck]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>CHEST</label>
                                <input type="number" placeholder="CHEST" value="{{json_decode($data[$key]['measurment'])->chest}}" name="measurment[chest]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>SIDE BUNS</label>
                                <input type="number" placeholder="SIDE BUNS" value="{{json_decode($data[$key]['measurment'])->side_buns}}" name="measurment[side_buns]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>After BMR</label>
                                <input type="number" placeholder="After BMR* Test" value="{{json_decode($data[$key]['measurment'])->after_bmr_test}}" name="measurment[after_bmr_test]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>HIPS</label>
                                <input type="number" placeholder="HIPS" value="{{json_decode($data[$key]['measurment'])->hips}}" name="measurment[hips]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>THIES</label>
                                <input type="number" placeholder="THIES" value="{{json_decode($data[$key]['measurment'])->thies}}" name="measurment[thies]" class="form-control no-boarder " >
                              </div>  
                              <div class="col-md-4">
                                <label>ARMS</label>
                                <input type="number" placeholder="ARMS" value="{{json_decode($data[$key]['measurment'])->arms}}" name="measurment[arms]" class="form-control no-boarder " >
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab2">
                            <br>
                            <h4 class="semi-bold">Step 2 - <span class="light">Medical History Form</span></h4>
                            <br>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <label>Name</label>
                                <input type="text"  value="{{json_decode($data[$key]['history'])->name}}" placeholder="Name" name="history[name]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <label>Age</label>
                                <input type="number" placeholder="Age" value="{{json_decode($data[$key]['history'])->age}}" name="history[age]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>profession</label>
                                <input type="text" placeholder="profession" value="{{json_decode($data[$key]['history'])->profession}}" name="history[profession]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4" class="form-control no-boarder" placeholder="profession" >
                                <label>Any disease</label>
                                <select id="source"  style="width:100%" name="history[disease_status]">
                                  <option value="">Do you have any disease?</option>
                                  @if(json_decode($data[$key]['history'])->disease_status ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->disease_status == 0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0">No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-6" id="disease">
                                <label>Enter disease</label>
                                <input type="text" placeholder="Enter disease"  value="{{json_decode($data[$key]['history'])->disease}}" name="history[disease]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Martial status</label>
                                <input type="text" placeholder="Martial status" value="{{json_decode($data[$key]['history'])->martial_status}}" name="history[martial_status]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">

                              </div>
                              <div class="col-md-4">
                                <label>Number of childers</label>
                                <input type="number" placeholder="Number of childrens"  value="{{json_decode($data[$key]['history'])->childrens_numbers}}" name="history[childrens_numbers]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4" class="form-control no-boarder"  placeholder="profession" >
                                <label>Overweight</label>
                                <select  style="width:100%" name="history[over_weight]">
                                  <option value="">Any child is over weight?</option>
                                  @if(json_decode($data[$key]['history'])->over_weight ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->over_weight == 0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0">No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Deliver of childer by</label>
                                <input type="text" placeholder="Delivery of children by"   value="{{json_decode($data[$key]['history'])->delivery_children_by}}" name="history[delivery_children_by]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Miscarriage</label>
                                <select  style="width:100%" name="history[dnc_miscarriage]">
                                  <option value="">Any DNC or miscarriage?</option>
                                  @if(json_decode($data[$key]['history'])->delivery_children_by ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->delivery_children_by == 0)
                                  <option value="1">Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Allergy</label>
                                <select  style="width:100%" name="history[allergy]">
                                  <option value="">Any allergy?</option>
                                  @if(json_decode($data[$key]['history'])->allergy ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->allergy == 0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0">No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Surgery</label>
                                <select  style="width:100%" name="history[surgery]">
                                  <option value="">Any surgery?</option>
                                  @if(json_decode($data[$key]['history'])->surgery ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->surgery == 0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>diabetic</label>
                                <select  style="width:100%" name="history[diabetic]">
                                  <option value="">Any diabetic person at home?</option>
                                  @if(json_decode($data[$key]['history'])->diabetic ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->diabetic ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Hyper tension</label>
                                <select  style="width:100%" name="history[hyper_tension]">
                                  <option value="">Any hyper tension person at home?</option>
                                  @if(json_decode($data[$key]['history'])->hyper_tension ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->hyper_tension ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Anemic</label>
                                <select  style="width:100%" name="history[anemic]">
                                  <option value="">Are you Anemic?</option>
                                  @if(json_decode($data[$key]['history'])->anemic ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->anemic ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>smoke</label>
                                <select  id="smoke" style="width:100%" name="history[smoke]">
                                  <option value="">Do you smoke?</option>
                                   @if(json_decode($data[$key]['history'])->smoke ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->smoke ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                               <div class="col-md-4"  id="smoking" >
                                <label>Quantityof smoking</label>
                                <input type="number" placeholder="Quantity of smoking"  value="{{json_decode($data[$key]['history'])->smoking}}"  name="history[smoking]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Alcoholic </label>
                                <select style="width:100%" name="history[alcoholic_drink]">
                                  <option value="">Do you take alcoholic drinks?</option>
                                   @if(json_decode($data[$key]['history'])->alcoholic_drink ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->alcoholic_drink ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Extra drugs</label>
                                <select style="width:100%" name="history[extra_drugs]">
                                  <option value="">Do you use any extra drugs?</option>
                                   @if(json_decode($data[$key]['history'])->extra_drugs ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->extra_drugs ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label>Medication</label>
                                <select   style="width:100%" name="history[medication]">
                                  <option value="">Are you currently under any medication?</option>
                                   @if(json_decode($data[$key]['history'])->medication ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->medication ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label>Menstrual History</label>
                                <input type="text"  placeholder="Menstrual History"  value="{{json_decode($data[$key]['history'])->menstrual_history}}" name="history[menstrual_history]" class="form-control no-boarder">
                              </div>
                              <div class="col-md-3">
                                <label>Days</label>
                                <input type="text" placeholder="Days"   value="{{json_decode($data[$key]['history'])->Days}}" name="history[Days]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>frequency</label>
                                <input type="text" placeholder="frequency"  value="{{json_decode($data[$key]['history'])->frequency}}" name="history[frequency]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>type</label>
                                <input type="text" placeholder="type"  value="{{json_decode($data[$key]['history'])->type}}" name="history[type]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>color</label>
                                <input type="text" placeholder="color"  value="{{json_decode($data[$key]['history'])->color}}" name="history[color]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6">
                                <label>Did you ever diet?</label>
                                <select   style="width:100%" id="dieting" name="history[did_diet]">
                                  <option value="">Did you ever diet?</option>
                                  @if(json_decode($data[$key]['history'])->did_diet ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->did_diet ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                              <div class="col-md-6" id="diet">
                                <label>How long did you kept on diet</label>
                                <input type="text" placeholder="How long did you kept on diet"  value="{{json_decode($data[$key]['history'])->how_long_diet}}" name="history[how_long_diet]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6" id="diet">
                                <label>How much did you loose?</label>
                                <input type="text" placeholder="How much did you loose?"  value="{{json_decode($data[$key]['history'])->how_much_loose}}" name="history[how_much_loose]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-12">
                                <label>Regain weight</label>
                                <select style="width:100%" name="history[regain_weight]">
                                  <option value="">Did you regain your weight once you stopped the dieting process?</option>
                                 @if(json_decode($data[$key]['history'])->regain_weight ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->regain_weight ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                               <div class="col-md-12">
                                <label>Physical exercise</label>
                                <select style="width:100%" name="history[physical_exercise]">
                                  <option value="">Did you physical exersice?</option>
                                   @if(json_decode($data[$key]['history'])->physical_exercise ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->physical_exercise ==0)
                                  <option value="1" >Yes</option>
                                  <option value="0" selected="">No</option>
                                  @else
                                  <option value="1" >Yes</option>
                                  <option value="0" >No</option>
                                  @endif
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab3">
                            <br>
                            <h4 class="semi-bold">Step 3 - <span class="light">Monitor</span></h4>
                            <br>
                          </div>
                          <div class="tab-pane" id="tab4">
                            <br>
                            <h4 class="semi-bold">Step 4 - <span class="light">Today's Monitoring Detail</span></h4>
                            <br>
                          </div>
                          <ul class=" wizard wizard-actions">
                            <li class="previous first" style="display:none;"><a href="javascript:;" class="btn">&nbsp;&nbsp;First&nbsp;&nbsp;</a></li>
                            <li class="previous"><a href="javascript:;" class="btn">&nbsp;&nbsp;Previous&nbsp;&nbsp;</a></li>
                            <li class="next last" style="display:none;"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Last&nbsp;&nbsp;</a></li>
                            <li class="next"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Next&nbsp;&nbsp;</a></li>
                            <li class="next"><input type="submit" class="btn btn-success" value="Submit"></li>
                          </ul>
                        </div>
                      </div>
                      @endforeach
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
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="{{URL('/')}}/backend/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{URL('/')}}/backend/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <script src="{{URL('/')}}/backend/assets/js/form_validations.js" type="text/javascript"></script>
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
      $('#source').change(function (){
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
@stop