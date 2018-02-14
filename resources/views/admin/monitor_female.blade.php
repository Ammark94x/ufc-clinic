@extends('templates.backendTemplate')
@section('title')
  Female Monitor Client
@endsection
@section('customStyles')
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<?php 
 /* echo "<pre>";
  var_dump($monitor_user);die;*/
  $gender=$user[0]->gender;
  $user_id=$user[0]->id;
  $name=$user[0]->name;
  if(isset($last_visit->products)){
    $product=explode(',', $last_visit->products);
    $quantity=explode(',', $last_visit->product_quantity);
    $given_products=json_decode($given_product);  
  }
  /*echo "<pre>";
  var_dump($monitor_user);die;*/
  /*echo "<pre>";
  var_dump($products);die;*/
?>
<div class="row">
            <div class="col-md-12">
              <div class="grid simple form-grid">
                <div class="grid-title no-border">
                  <h4>Female Monitoring<span class="semi-bold"> Detail  For <span style="color:#E75480;font-weight: bold"><?php echo ' '.$name;?></span></span></h4>
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
                    <div class="row column-seperation">
                      <div class="col-md-6">
                        <h4>Last visit detail</h4>
                        <?php if(isset($last_visit) && !empty($last_visit)){?>
                        <table class="table table-hover table-condensed" id="example">
                          <tr>
                            <td style="font-weight: bold;">Date of last visit</td>
                            <td>{{$last_visit->dov}}</td>
                            <td style="font-weight: bold;">Neck</td>
                            <td>{{$last_visit->neck}} inches</td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Chest</td>
                            <td>{{$last_visit->chest}} inches</td>
                            <td style="font-weight: bold;">Side Buns</td>
                            <td>{{$last_visit->side_buns}} inches</td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Waist</td>
                            <td>{{$last_visit->waist}} inches</td>
                            <td style="font-weight: bold;">Hips</td>
                            <td>{{$last_visit->hips}} inches</td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Theighs</td>
                            <td>{{$last_visit->thighs}} inches</td>
                            <td style="font-weight: bold;">Arms</td>
                            <td>{{$last_visit->arms}} inches</td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Lower Waist</td>
                            <td>{{$last_visit->lower_waist}} inches</td>
                            <td style="font-weight: bold;">Total Inches Reduced</td>
                            <td>{{$last_visit->total_inches}} inches</td>
                          </tr>
                          
                          <?php $count=0;?>
                         @foreach($product as $key =>$val)
                          <tr>
                            <td style="font-weight: bold;">Products</td>
                            <td>
                              @if(isset($given_products[$count]->item_name))
                                {{$given_products[$count]->item_name}}
                              @endif  
                            </td>
                            <td style="font-weight: bold;">Quantity</td>
                            <td>
                              @if(isset($quantity[$count]))
                                {{$quantity[$count]}}
                              @endif</td>
                          </tr>
                          
                          <?php $count++;?>
                          @endforeach
                          <tr>
                            <td style="font-weight: bold;">Package</td>
                            <td>
                              @if(isset($last_visit->package))
                                {{$last_visit->package}}
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Full Payment</td>
                            <td>{{$last_visit->full_payment}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Payment Recieved</td>
                            <td>{{$last_visit->payment_recieved}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Balance</td>
                            <td>{{$last_visit->balance}}</td>
                            <td></td>
                            <td></td>
                          </tr>
                          </tbody>
                        </table>
                        <?php }else{ ?>
                        <img src="http://www.weightlossresources.co.uk/img/p/portion-controlled-meals-best-to-lose-weight.png" width="100%">
                        <?php }?>
                        {{-- <div class="row form-row">
                          <div class="col-md-12">
                            <input name="form3Email" id="form3Email" type="text" class="form-control" placeholder="email@address.com">
                          </div>
                        </div> --}}
                      </div>
                      <div class="col-md-6">
                        <h4>Today's Monitoring Detail</h4>
                        <form class="form-no-horizontal-spacing" action="{{route('storeMonitor')}}" id="form-condensed" method="post">
                          {{csrf_field()}}
                        <div class="row form-row">
                          <div class="col-md-4">
                            <?php 
                              date_default_timezone_set('Asia/Karachi');
                              $date=date('d-m-Y');
                             ?>
                            <label>Date of visit</label>
                            <input name="dov" id="dov" type="text" class="form-control" value="{{$date}}">
                          </div>   
                          <div class="col-md-2">
                            <label>Neck</label>
                            <input name="neck" type="number"  id="neck" type="text" class="form-control" placeholder="inches" required="">
                          </div>
                          <div class="col-md-2">
                            <label>Chest</label>
                            <input name="chest" type="number"  id="chest" type="text" class="form-control" placeholder="inches" required="">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-2">
                            <label>Side Buns</label>
                            <input name="side_buns" type="number" id="side_buns"  type="text" class="form-control" placeholder="inches"  required="">
                          </div>
                          <div class="col-md-2">
                            <label>Waist</label>
                            <input name="waist" type="number" id="waist"  type="text" class="form-control" placeholder="inches"  required="">
                          </div>
                          <div class="col-md-2">
                            <label>Hips</label>
                            <input name="hips"  id="hips" type="text" class="form-control" placeholder="inches"  required="">
                          </div>
                          <div class="col-md-2">
                            <label>Theighs</label>
                            <input name="thighs" type="number" id="thighs"  type="text" class="form-control" placeholder="inches"  required="">
                          </div>
                          <div class="col-md-4" >
                              <label>Arms</label>
                              <input name="arms" id="arms" type="number" class="form-control" placeholder="inches"  required="">
                            </div>
                            <div class="col-md-6" >
                              <label>Lower Waist</label>
                              <input name="lower_waist" id="lower_waist" type="number" class="form-control" placeholder="inches"  required="">
                            </div>
                            <div class="col-md-4" >
                              <label>Total Inches For Today</label>
                              <input name="total_inches"  id="total_inches" readonly="" type="number" class="form-control" placeholder="inches"  required="">
                            </div>
                            @if(isset($last_visit->total_inches) && !empty($last_visit->total_inches))
                            <div class="col-md-4" style="display: none">
                              <label>Inches Reduced</label>
                              <input  type="hidden"  id="reduced_inches" readonly="" value="{{$last_visit->total_inches}}" type="number" class="form-control" placeholder="inches"  required="">
                            </div>
                            @endif
                            <div class="col-md-4" >
                              <label>Inches Reduced</label>
                              <input  type="number"  id="reduced" readonly=""  type="number" class="form-control" placeholder="inches"  required="">
                            </div>
                          </div>
                          <div class="col-md-6">
                              <label>Package</label>
                              <select name="package" required="">
                                <option value="">Select package</option>
                                @for($i=1;$i<=12;$i++)
                                <option value="{{$i}} month">{{$i}} month</option>
                                @endfor
                                <option value="BMR">BMR</option>
                                <option value="15 days package">15 days package</option>
                                <option value="Continue">Continue</option>
                                <option value="Closed">Closed</option>
                              </select> 
                            </div>
                          {{-- hidden fields for the databale --}}
                          <input type="hidden" name="gender" value="{{$gender}}">
                          <input type="hidden" name="user_id" value="{{$user_id}}">

                          <input type="hidden" name="gender" value="{{$gender}}">
                          <input type="hidden" name="user_id" value="{{$user_id}}">

                          <div class="col-md-4">
                            <label>Full Payment</label>
                            <input name="full_payment" type="number"  id="full_payment" type="text" class="form-control"  >
                          </div>
                          <div class="col-md-4">
                            <label>Payment Recieved</label>
                            <input name="payment_recieved"  type="text" id="payment_recieved" class="form-control"  >
                          </div>
                          <div class="col-md-4">
                            <label>Balance</label>
                            <input name="balance" type="number" id="balance" type="text" class="form-control" >
                          </div>

                          <div id="clone_div">
                            <div class="col-md-6">
                              <label>Products</label>
                              <select name="product[]">
                                <option>Select product</option>
                                @foreach($products as $key => $val)
                                <option value="{{$val->id}}">{{$val->item_name}}</option>
                                @endforeach
                              </select> 
                            </div>
                            <div class="col-md-4 " >
                              <label>quantity</label>
                              <input name="product_quantity[]" type="text" class="form-control" >
                            </div>
                          </div>
                          <div  id="cloned_div" >
                                
                          </div>
                          <div class="col-md-4" id="products">
                              <span class="btn btn-success clone_it">Add more products</span>  
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
                      <div class="pull-left">
                        <div class="checkbox checkbox check-success">
                          <input type="checkbox" value="1" id="chkTerms">
                          <label for="chkTerms">I Here by agree on the Term and condition. </label>
                        </div>
                      </div>
                      <div class="pull-right">
                        <input type="submit" class="btn btn-danger btn-cons"><i class="icon-ok"></i>
                        <a class="btn btn-white btn-cons" href="{{route('clientList')}}">Cancel</a>
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
                  <h4>Female <span class="semi-bold">Monitoring</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table" id="ufc_table">
                    <thead>
                      <tr>
                        <th>Date of visit</th>
                        <th>Neck</th>
                        <th>Chest</th>
                        <th>Side Buns</th>
                        <th>Waist</th>
                        <th>Theighs</th>
                        <th>Hips</th>
                        <th>Arms</th>
                        <th>Total Inches</th>
                        <th>Package</th>
                        <th>Product (Quantity)</th>
                        <th>Full Payment</th>
                        <th>Payment Recieved</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
                    <tbody>
                      
                      @foreach($monitor_user as $key => $val)
                      <tr class="odd gradeX">
                        <td>{{$val->dov}}</td>
                        <td>{{$val->neck}}</td>
                        <td>{{$val->chest}}</td>
                        <td>{{$val->side_buns}}</td>
                        <td class="center">{{$val->waist}}</td>
                        <td class="center">{{$val->thighs}}</td>
                        <td>{{$val->hips}}</td>
                        <td class="center">{{$val->arms}}</td>
                        <td>{{$val->total_inches}}</td>
                        <td class="center">{{$val->package}}</td>
                        <td><?php 
                          $count=0;
                          $products_given=explode(',', $val->products);
                          $product_quantity=explode(',', $val->product_quantity);
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
                        <td>{{$val->full_payment}}</td>
                        <td>{{$val->payment_recieved}}</td>
                        <td>{{$val->balance}}</td>
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
<script src="{{URL('/')}}/backend/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="{{URL('/')}}/backend/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).on('click','.clone_it',function (){
        $('#clone_div').clone().appendTo('#cloned_div');
      });
      $("input").on('keyup',function(){
        neck=$('#neck').val();
        chest=$('#chest').val();
        side_buns=$('#side_buns').val();
        waist=$('#waist').val();
        hips=$('#hips').val();
        thighs=$('#thighs').val();
        arms=$('#arms').val();
        lower_waist=$('#lower_waist').val();
        reduced_incehs=$('#reduced_inches').val();
        sum= +neck +  +chest;
        sum= +side_buns + +waist + +sum;
        sum= +hips + +thighs + +arms + +lower_waist + +sum;
        reduced= +reduced_incehs - +sum;
        $('#total_inches').val(sum);
        $('#reduced').val(reduced);
      });
    </script>
    <script type="text/javascript">
      $('#payment_recieved,#full_payment').on('keyup',function(){
         full_payment=$('#full_payment').val();
        payment_recieved=$('#payment_recieved').val();
        balance=+full_payment - +payment_recieved;
        $('#balance').val(balance);
      });
    </script>
    <!-- END PAGE LEVEL JS INIT -->
    {{-- <script src="{{URL('/')}}/backend/assets/js/datatables.js" type="text/javascript"></script> --}}

@stop 
