@extends('templates.backendTemplate')
@section('title','Add Staff')
@section('customStyles')
@endsection
@section('content')
<ul class="breadcrumb">
    <li>
      <p>Report for Package Delivery</p>
    </li>
		<li><a href="#" class="active">List Deliveries</a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
<h3>List <span class="semi-bold">Package Delivery</span></h3>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <h4>Package <span class="semi-bold">Details</span></h4>
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <br>
      <form action="{{route('staff.store')}}" method="POST">
      {{csrf_field()}}
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">Month</label>
            <div class="controls">
              <select name="role" class="form-control" required>
              	<option value="">Select Month</option>
	            <option value="01">January</option>
	            <option value="02">Febuary</option>
	            <option value="03">March</option>
              <option value="04">April</option>
              <option value="05">May</option>
              <option value="06">June</option>
              <option value="07">july</option>
              <option value="08">August</option>
              <option value="09">Septembery</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>

	          </select>
            </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">package</label>
            <div class="controls">
              <select name="package" class="form-control" required>
                <option value="">Select package</option>
              {{-- @foreach($product as $key => $val)  --}} 
              <option value="BMR">BMR</option>
              <option value="15 days package">15 days package</option>
              {{-- @endforeach --}}
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