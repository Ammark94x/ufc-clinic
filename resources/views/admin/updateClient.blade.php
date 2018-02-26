@extends('templates.backendTemplate')
@section('title')
  Monitor Client
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
                    <form class="form-no-horizontal-spacing" name="male_monitorForm" action="{{route('storeMonitor')}}" id="male_monitorForm" method="post">{{csrf_field()}}</form>
                          
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
                            @if($user_data['gender'] == 'male')
                            <li data-target="#step3" class="">
                              <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">Monitor Male</span> </a>
                            </li>
                            @else
                            <li data-target="#step4" class="">
                              <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Monitor Female</span> </a>
                            </li>
                            @endif
                            <li data-target="#step5" class="">
                              <a href="#tab5" data-toggle="tab"> <span class="step">4</span> <span class="title"> Account Detail</span> </a>
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
                                <label>How did you came to know about us?</label>
                                <input form="male_monitorForm" type="text" placeholder="How did you came to know about us?" class="form-control no-boarder" name="data[about_us]" value="{{json_decode($data[$key]['data'])->about_us}}" id="txtFullName">
                              </div>
                            </div>
                            <div class="row form-row">
                              <div class="col-md-4">
                                <label>Arrival date</label>
                                <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input form="male_monitorForm" type="text" class="form-control" name="data[arrival_date]" value="{{json_decode($data[$key]['data'])->arrival_date}}" placeholder="Date">
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                              </div>
                              <input form="male_monitorForm" type="hidden" name="metaUserId" value="{{$user_id}}">
                              <div class="col-md-4">
                                <label>Arrival time</label>
                                 <div class="input-group transparent clockpicker col-md-6">
                              <input form="male_monitorForm" type="text" class="form-control" name="data[arrival_time]" value="{{json_decode($data[$key]['data'])->arrival_time}}" placeholder="Pick a time">
                              <span class="input-group-addon ">
                                <i class="fa fa-clock-o"></i>
                              </span>
                            </div>
                                
                              </div>
                               <div class="col-md-4">
                                <label>Next visit</label>
                            <div class="input-append success date col-md-10 col-lg-6 no-padding">
                              <input form="male_monitorForm" type="text" class="form-control" name="data[next_visit]" value="{{json_decode($data[$key]['data'])->next_visit}}" placeholder="Next visit">
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                              </div>
                              
                              <div class="col-md-4">
                                <label>Name</label>
                                <input form="male_monitorForm" type="text" placeholder="Name" name="name"   value="{{$user_data['name']}}" class="form-control no-boarder " id="txtLastName" required>
                              </div>
                              <div class="col-md-4">
                                <label>Father name/Guardian name</label>
                                <input form="male_monitorForm" type="text" placeholder="Father's/ Husband Name" name="f_name"  value="{{$user_data['f_name']}}" class="form-control no-boarder " id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <label>Residential or office address</label>
                                <input form="male_monitorForm" type="text" placeholder="Residential or Office Address"  value="{{$user_data['address']}}" class="form-control no-boarder " name="address" id="txtLastName">
                              </div>
                              <div class="col-md-4">
                                <label>Residential ptcl number</label>
                                <input form="male_monitorForm" type="number" placeholder="Residential PTCL Number" name="res_phone"  value="{{$user_data['res_phone']}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <select form="male_monitorForm"  id="source" style="width:100%" name="location">
                                  <option value="">select city</option>
                                  @foreach($cities as $vall => $city)
                                  @if($user_data['location'] == $city->city )
                                  <option value="{{$city->city}}" selected="">{{$city->city}}</option>
                                  @else
                                  <option value="{{$city->city}}" >{{$city->city}}</option>
                                  @endif
                                  @endforeach
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Office ptcl number</label>
                                <input form="male_monitorForm" type="number" placeholder="Office PTCL Number" name="office_phone"  value="{{$user_data['office_phone']}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Mobile</label>
                                <input form="male_monitorForm" type="text" placeholder="Mobile Number Ex:9231245678" name="mobile"  value="{{$user_data['mobile']}}" class="form-control no-boarder " required>
                              </div>
                              <div class="col-md-4">
                                <label>Age</label>
                                <input form="male_monitorForm" type="number" placeholder="Age" name="age"  value="{{$user_data['age']}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Email</label>
                                <input form="male_monitorForm" type="email" placeholder="Email" name="email" required  value="{{$user_data['email']}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Gender</label>
                                <div class="radio">
                                  @if($user_data['gender'] == 'male')
                                    <input form="male_monitorForm" id="male" type="radio" name="gender" value="male" checked="checked">
                                    <label for="male">Male</label>
                                    <input form="male_monitorForm" id="female" type="radio" name="gender" value="female">
                                    <label for="female">Female</label>
                                  @else
                                    <input form="male_monitorForm" id="male" type="radio" name="gender" value="male" >
                                    <label for="male">Male</label>
                                    <input form="male_monitorForm" id="female" type="radio" name="gender" value="female" checked="checked">
                                    <label for="female">Female</label>
                                  @endif
                                </div>
                              </div>
                              
                              <div class="col-md-2">
                                <label>Height fit</label>
                                <input form="male_monitorForm" type="number" placeholder="height fit" name="data[height]" value="{{json_decode($data[$key]['data'])->height}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <label>Inch</label>
                                <input form="male_monitorForm" type="number" placeholder="inch" name="data[inch]" value="{{json_decode($data[$key]['data'])->height}}" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Actual weight</label>
                                <input form="male_monitorForm" type="number" placeholder="Actual Weight" value="{{json_decode($data[$key]['data'])->actual_weight}}" name="data[actual_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>After BMR* test</label>
                                <input form="male_monitorForm" type="number" placeholder="After BMR* Test" value="{{json_decode($data[$key]['data'])->after_bmr_test}}" name="data[after_bmr_test]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Variation on weight</label>
                                <input form="male_monitorForm" type="number" placeholder="Variation on weight" value="{{json_decode($data[$key]['data'])->variation_weight}}" name="data[variation_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Ideal weight should be</label>
                                <input form="male_monitorForm" type="number" value="{{json_decode($data[$key]['data'])->ideal_weight}}" placeholder="Ideal weight should be" name="data[ideal_weight]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-8">
                                <label>Consultant Openion</label>
                                <textarea form="male_monitorForm"  placeholder="Consultant Openion" name="data[consultant_openion]"  class="form-control no-boarder" >{{json_decode($data[$key]['data'])->consultant_openion}}</textarea> 
                              </div>
                              <div class="col-md-12">
                                <label>Why are you loosing weight</label>
                                <textarea form="male_monitorForm" placeholder="Why are you loosing weight"  name="data[loosing_Weight]" class="form-control no-boarder" >{{json_decode($data[$key]['data'])->loosing_Weight}}</textarea> 
                              </div>
                              <h3>Measurements</h1><br>
                              <div class="col-md-4">
                                <label>NECK</label>
                                <input form="male_monitorForm" type="number" placeholder="NECK" value="{{json_decode($data[$key]['measurment'])->neck}}" name="measurment[neck]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                  <label>WAIST</label>
                                  <input form="male_monitorForm" type="number" placeholder="Waist" name="measurment[waist]" class="form-control no-boarder" value="{{json_decode($data[$key]['measurment'])->waist}}" >
                                </div>
                              <div class="col-md-4">
                                <label>CHEST</label>
                                <input form="male_monitorForm" type="number" placeholder="CHEST" value="{{json_decode($data[$key]['measurment'])->chest}}" name="measurment[chest]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>SIDE BUNS</label>
                                <input form="male_monitorForm" type="number" placeholder="SIDE BUNS" value="{{json_decode($data[$key]['measurment'])->side_buns}}" name="measurment[side_buns]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>After BMR</label>
                                <input form="male_monitorForm" type="number" placeholder="After BMR* Test" value="{{json_decode($data[$key]['measurment'])->after_bmr_test}}" name="measurment[after_bmr_test]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>HIPS</label>
                                <input form="male_monitorForm" type="number" placeholder="HIPS" value="{{json_decode($data[$key]['measurment'])->hips}}" name="measurment[hips]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>THIGH</label>
                                <input form="male_monitorForm" type="number" placeholder="THIGH" value="{{json_decode($data[$key]['measurment'])->thies}}" name="measurment[thies]" class="form-control no-boarder " >
                              </div>  
                              <div class="col-md-4">
                                <label>ARMS</label>
                                <input form="male_monitorForm" type="number" placeholder="ARMS" value="{{json_decode($data[$key]['measurment'])->arms}}" name="measurment[arms]" class="form-control no-boarder " >
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
                                <input form="male_monitorForm" type="text"  value="{{json_decode($data[$key]['history'])->name}}" placeholder="Name" name="history[name]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-2">
                                <label>Age</label>
                                <input form="male_monitorForm" type="number" placeholder="Age" value="{{json_decode($data[$key]['history'])->age}}" name="history[age]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>profession</label>
                                <input form="male_monitorForm" type="text" placeholder="profession" value="{{json_decode($data[$key]['history'])->profession}}" name="history[profession]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4" class="form-control no-boarder" placeholder="profession" >
                                <label>Any disease</label>
                                <select form="male_monitorForm"  id="source"  style="width:100%" name="history[disease_status]">
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
                                <input form="male_monitorForm" type="text" placeholder="Enter disease"  value="{{json_decode($data[$key]['history'])->disease}}" name="history[disease]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Marital status</label>
                                <select form="male_monitorForm"  name="history[martial_status]"  id="source" style="width:100%">
                                  <option value="">Please select Marital Status</option>
                                  <option value="Single" {{(json_decode($data[$key]['history'])->martial_status == 'Single')?'selected':''}}>Single</option>
                                  <option value="Married" {{(json_decode($data[$key]['history'])->martial_status == 'Married')?'selected':''}}>Married</option>
                                  <option value="Widow" {{(json_decode($data[$key]['history'])->martial_status == 'Widow')?'selected':''}}>Widow</option>
                                  <option value="Divorced" {{(json_decode($data[$key]['history'])->martial_status == 'Divorced')?'selected':''}}>Divorced</option>
                                </select>
                              </div>
                              <div class="col-md-4">

                              </div>
                              <div class="col-md-4">
                                <label>Number of childers</label>
                                <input form="male_monitorForm" type="number" placeholder="Number of childrens"  value="{{json_decode($data[$key]['history'])->childrens_numbers}}" name="history[childrens_numbers]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4" class="form-control no-boarder"  placeholder="profession" >
                                <label>Overweight</label>
                                <select form="male_monitorForm"   style="width:100%" name="history[over_weight]">
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
                                 <select form="male_monitorForm"   style="width:100%"  name="history[delivery_type]"  id="miscarriage_type">
                                  <option value="">Delivery BY</option>
                                  <option value="Normal" {{(json_decode($data[$key]['history'])->delivery_type == 'Normal')?'selected':''}}>Normal</option>
                                  <option value="C-Section" {{(json_decode($data[$key]['history'])->delivery_type == 'C-Section')?'selected':''}}>C-Section</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label>Miscarriage</label>
                                <select form="male_monitorForm"   style="width:100%" name="history[dnc]">
                                  <option value="">Any DNC or miscarriage?</option>
                                  @if(json_decode($data[$key]['history'])->dnc ==1)
                                  <option value="1" selected="">Yes</option>
                                  <option value="0">No</option>
                                  @elseif(json_decode($data[$key]['history'])->dnc == 0)
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
                                <select form="male_monitorForm"   style="width:100%" name="history[allergy]">
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
                                <select form="male_monitorForm"   style="width:100%" name="history[surgery]">
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
                                <select form="male_monitorForm"   style="width:100%" name="history[diabetic]">
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
                                <select form="male_monitorForm"   style="width:100%" name="history[hyper_tension]">
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
                                <select form="male_monitorForm"   style="width:100%" name="history[anemic]">
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
                                <select form="male_monitorForm"   id="smoke" style="width:100%" name="history[smoke]">
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
                                <input form="male_monitorForm" type="number" placeholder="Quantity of smoking"  value="{{json_decode($data[$key]['history'])->smoking}}"  name="history[smoking]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-4">
                                <label>Alcoholic </label>
                                <select form="male_monitorForm"  style="width:100%" name="history[alcoholic_drink]">
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
                                <select form="male_monitorForm"  style="width:100%" name="history[extra_drugs]">
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
                                <select form="male_monitorForm"    style="width:100%" name="history[medication]">
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
                              @if(json_decode($data[$key]['history'])->medication ==1)
                              <div class="col-md-6">
                                <label>Medicatin Description</label>
                                   <div class="col-md-6">
                                    <input form="male_monitorForm" type="text" placeholder="Please description your medication" name="history[medication_reason]" id="medication_reason" value="{{json_decode($data[$key]['history'])->medication_reason}}">
                              </div>
                              </div>
                              @endif
                              <div class="col-md-6">
                                <label>Menstrual History</label>
                                <select form="male_monitorForm"    style="width:100%" name="history[menstrual_history]">
                                  <option value="">Please specify menstrual history</option>
                                  <option value="Regular" {{(json_decode($data[$key]['history'])->menstrual_history =='Regular')?'selected':''}}>Regular</option>
                                  <option value="Irregular" {{(json_decode($data[$key]['history'])->menstrual_history =='Irregular')?'selected':''}}>Irregular</option>
                                  <option value="Menopause" {{(json_decode($data[$key]['history'])->menstrual_history =='Menopause')?'selected':''}}>Menopause</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label>Days</label>
                                <input form="male_monitorForm" type="text" placeholder="Days"   value="{{json_decode($data[$key]['history'])->Days}}" name="history[Days]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>frequency</label>
                                <input form="male_monitorForm" type="text" placeholder="frequency"  value="{{json_decode($data[$key]['history'])->frequency}}" name="history[frequency]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>type</label>
                                <input form="male_monitorForm" type="text" placeholder="type"  value="{{json_decode($data[$key]['history'])->type}}" name="history[type]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-3">
                                <label>color</label>
                                <input form="male_monitorForm" type="text" placeholder="color"  value="{{json_decode($data[$key]['history'])->color}}" name="history[color]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6">
                                <label>Did you ever diet?</label>
                                <select form="male_monitorForm"    style="width:100%" id="dieting" name="history[did_diet]">
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
                                <input form="male_monitorForm" type="text" placeholder="How long did you kept on diet"  value="{{json_decode($data[$key]['history'])->how_long_diet}}" name="history[how_long_diet]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-6" id="diet">
                                <label>How much did you loose?</label>
                                <input form="male_monitorForm" type="text" placeholder="How much did you loose?"  value="{{json_decode($data[$key]['history'])->how_much_loose}}" name="history[how_much_loose]" class="form-control no-boarder " >
                              </div>
                              <div class="col-md-12">
                                <label>Regain weight</label>
                                <select form="male_monitorForm"  style="width:100%" name="history[regain_weight]">
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
                                <select form="male_monitorForm"  style="width:100%" name="history[physical_exercise]">
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
                          @if($user_data['gender'] == 'male')
                          <div class="tab-pane" id="tab3">
                            <br>
                            <h4 class="semi-bold">Step 3 - <span class="light">Monitor Male</span></h4>
                            <br>
                            {{-- Monitor Male Info --}}
                            <?php 
                                  if(isset($user) && !empty($user)){
                                    $gender=$user[0]->gender;
                                    $user_id=$user[0]->id;
                                  }
                                  $name=$user[0]->name;
                                  if(isset($last_visit->products)){
                                    $product=explode(',', $last_visit->products);
                                    $quantity=explode(',', $last_visit->product_quantity);
                                    $given_products=json_decode($given_product);  
                                  }
                                ?>
                            @include('includes.monitor_male')
                          </div>
                          @else
                          <div class="tab-pane" id="tab4">
                            <br>
                            <h4 class="semi-bold">Step 3 - <span class="light">Monitor Female</span></h4>
                            <br>
                          </div>
                          @endif
                         <div class="tab-pane" id="tab5">
                            <br>
                            <h4 class="semi-bold">Step 4 - <span class="light">Account Detail</span></h4>
                            <br>
                            {{-- Monitoring Section --}}
                            <div class="row-fluid">
                              <div class="span12">
                                <div class="grid simple ">
                                  <div class="grid-title">
                                    <div class="col-md-12">
                                      <div class="col-md-6">
                                        <label>Full Payment</label>
                                        <input  form="male_monitorForm" name="full_payment" type="number"  id="full_payment" type="text"   >
                                      </div>
                                      <div class="col-md-4">
                                        <label>Payment Recieved</label>
                                        <input form="male_monitorForm" name="payment_recieved"  type="text" id="payment_recieved"   >
                                      </div>
                                      <div class="col-md-4">
                                        <label>Balance</label>
                                        <input form="male_monitorForm" name="balance" type="number" id="balance" type="text"  >
                                      </div>
                                    </div>
                                    <h4>Male <span class="semi-bold">Account</span></h4>
                                    <div class="tools">
                                      <a href="javascript:;" class="collapse"></a>
                                      <a href="#grid-config" data-toggle="modal" class="config"></a>
                                      <a href="javascript:;" class="reload"></a>
                                      <a href="javascript:;" class="remove"></a>
                                    </div>
                                  </div>
                                  <div class="grid-body " style="background: white !important">
                                    <table class="table" id="monitor_table">
                                      <thead>
                                        <tr>
                                          <th>Date of visit</th>
                                          <th>Present weight</th>
                                          <th>Result</th>
                                          <th>Weight in LBS</th>
                                          <th>Products</th>
                                          <th>Package</th>
                                          <th>Full Payment</th>
                                          <th>Payment Recieved</th>
                                          <th>Balance</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                         
                                        @foreach($user as $key => $val)
                                          @foreach($monitor_user as $keys => $monitor)
                                        <tr class="odd gradeX">
                                          <td>{{$monitor->dov}}</td>
                                          <td>{{$monitor->present_weight}}</td>
                                          <td>{{$monitor->result}}</td>
                                          <td>{{$monitor->weight}}</td>
                                          <td class="center"><?php 
                                            $count=0;
                                            $products_given=explode(',', $monitor->products);
                                            $product_quantity=explode(',', $monitor->product_quantity);
                                            foreach ($products_given as $key => $pro) {
                                              foreach ($products as $key => $value) {
                                                if($value->id == $pro){
                                                  echo $value->item_name.' ='.$product_quantity[$count].'';
                                                  echo "<br>";   
                                                  $count++;
                                                }
                                              }
                                               
                                               
                                            }
                                          ?></td>
                                          <td class="center">{{$monitor->package}}</td>
                                          <td class="center">{{$monitor->full_payment}}</td>
                                          <td>{{$monitor->payment_recieved}}</td>
                                          <td class="center">{{$monitor->balance}}</td>
                                        </tr>
                                        @endforeach
                                          @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
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
    {{-- additiong for balance --}}
    <script type="text/javascript">
      $('#payment_recieved,#full_payment').on('keyup',function(){
         full_payment=$('#full_payment').val();
        payment_recieved=$('#payment_recieved').val();
        balance=+full_payment - +payment_recieved;
        $('#balance').val(balance);
      });
    </script>
    <script type="text/javascript">
      $('#present_weight').on('keyup',function (){
        present_weight=$(this).val();
        weight_lbs=present_weight*2.205;
        $('#weight').val(weight_lbs);
        /*previous weight*/
        previous_weight=$('#previous_weight').val();
        weight_difference=present_weight - previous_weight;
        if(present_weight > previous_weight){
            $('#result_label').text('Weight Increased (Kg)');
        }else{
            $('#result_label').text('Weight Reduced (Kg)');
        }
        $('#weight_difference').val(Math.abs(weight_difference));
      })
    </script>
@stop