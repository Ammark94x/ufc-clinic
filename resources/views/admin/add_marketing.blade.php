@extends('templates.backendTemplate')
@section('title','Add Marketing Item')
@section('customStyles')
<link href="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<ul class="breadcrumb">
    <li>
      <p>Marketing Item</p>
    </li>
		<li><a href="#" class="active">Add Marketing Item</a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
<h3>Add <span class="semi-bold">Marketing Item</span></h3>
</div>
<div class="grid simple">
    <div class="grid-title no-border">
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="grid-body no-border">
      <br>
      <form action="{{route('storeMarketing')}}" method="POST">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">Select Item</label>
            <div class="controls">
            	{{csrf_field()}}
              <select name="expense" class="form-control" required>
                <option value="">Select Item</option>
                <option value="Print Media">Print Media</option>
                <option value="Social Media">Social Media</option>
                <option value="Advertisement Company">Advertisement Company</option>
                <option value="Advertisement Magazine">Advertisement Magazine</option>
                <option value="Other">Other</option>
            </select>
            </div>
          </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">Date</label>
            <div class="controls">
              <input type="text" name="date" class="form-control datepicker" value="{{date('Y-m-d')}}" required>              
            </div>
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
          <div class="form-group">
            <label class="form-label">Amount</label>
            <div class="controls">
              <input type="number" class="form-control" name="amount" required>
            </div>
          </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<input type="submit" value="Save" class="btn btn-primary pull-right">
    	</div>
    </div>
	</form>
  </div>
</div>
@endsection
@section('customScripts')
<script src="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    format: 'Y-m-d'
 });
</script>
@endsection