@extends('templates.backendTemplate')
@section('title')
	Update item
@endsection
@section('customStyles')
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen" />
@endsection
@section('content')

<div class="row">
            <div class="col-md-12">
              <div class="grid simple form-grid">
                <div class="grid-title no-border">
                  <h4><span style="font-weight: bold;color: orange">{{$product[0]['item_name']}}</span><span class="semi-bold"> Detail For <span style="color:blue;font-weight: bold"></span></span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                   @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                  @endif
                      <div class="col-md-12">
                        <h4>Today's <span style="font-weight: bold;color: orange">{{$product[0]['item_name']}}</span> Detail</h4>
                        <form class="form-no-horizontal-spacing" action="{{route('updateItem')}}" method="post">
                          {{csrf_field()}}
                        <div class="row">
                          <div class="col-md-4">
                            <?php 
                              date_default_timezone_set('Asia/Karachi');
                              $date=date('d-m-Y');
                             ?>
                            <label>Date of visit</label>
                            <input name="date"  type="text" class="form-control" value="{{$date}}" readonly="">
                          </div>   
                          <div class="col-md-4">
                            <label>Opening</label>
                            <input name="opening" type="text"  type="text" class="form-control" id="opening" required="">
                          </div>
                          <div class="col-md-4">
                            <label>Recieving</label>
                            <input name="recieving" type="text"  type="text" class="form-control" id="recieving" required="" >
                          </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{$product[0]['id']}}" >
                        <div class="row form-row">
                          <div class="col-md-4">
                            <label>Total</label>
                            <input name="total" type="text"  type="text" class="form-control" id="total" required="" readonly="">
                          </div>
                          <div class="col-md-4">
                            <label>Used</label>
                            <input name="used" type="text"   type="text" class="form-control" id="used" required="" >
                          </div>
                          <div class="col-md-4">
                            <label>Closed</label>
                            <input name="closed"  type="text"  class="form-control" id="closed" required="" readonly="">
                          </div>
                        </div>
                        {{-- <div class="row small-text">
                          <p class="col-md-12">
                            NOTE - Facts to be considered, Simply remove or edit this as for what you desire. Disabled font Color and size
                          </p>
                        </div> --}}
                      </div>
                    </div>
                    <div class="form-actions">
                      <div class="pull-right">
                        <input type="submit" class="btn btn-danger btn-cons"><i class="icon-ok"></i>
                        <a class="btn btn-white btn-cons" href="{{route('listItems')}}">Cancel</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="row-fluid">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span style="font-weight: bold;color: orange">{{$product[0]['item_name']}} </span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table" id="example3">
                    <thead>
                      <tr>
                        <th>Date</th>
                        <th>Opening</th>
                        <th>Recieving</th>
                        <th>Total</th>
                        <th>Used</th>
                        <th>Closed</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($getItem as $key => $val)
                       <tr class="odd gradeX">
                        <td>{{$val->date}}</td>
                        <td>{{$val->opening}}</td>
                        <td>{{$val->recieving}}</td>
                        <td>{{$val->total}}</td>
                        <td class="center">{{$val->used}}</td>
                        <td class="center">{{$val->closed}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
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
      $("input").on('keyup',function(){
        opening=$('#opening').val();
        recieving=$('#recieving').val();
        total=$('#total').val();
        closed=$('#closed').val();
        used=$('#used').val();
        sum= +opening +  +recieving;
        $('#total').val(sum);
        sum= +sum - +used;
        $('#closed').val(sum);
      });
    </script>
@stop