@extends('templates.backendTemplate')
@section('title')
  Male Monitor Client
@endsection
@section('customStyles')
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<?php 
  /*echo "<pre>";
  var_dump($monitor_user);die;*/
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
  /*echo "<pre>";
  var_dump($products);die;*/
?>
<div class="row">
            <div class="col-md-12">
              <div class="grid simple form-grid">
                <div class="grid-title no-border">
                  <h4>Monitoring<span class="semi-bold"> Detail For <span style="color:blue;font-weight: bold"><?php echo ' '.$name;?></span></span></h4>
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
                        <?php if(isset($last_visit->dov)&& !empty($last_visit->dov)){?>
                        <table class="table table-hover table-condensed" id="example">

                          <tr>
                            <td style="font-weight: bold;">Date of last visit</td>
                            <td>
                              @if(isset($last_visit->dov))
                                {{$last_visit->dov}}  
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Present Weight</td>
                            <td>
                              @if(isset($last_visit->present_weight))
                                {{$last_visit->present_weight}}
                              @endif  
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Result</td>
                            <td>
                              @if(isset($last_visit->result))
                                {{$last_visit->result}}
                              @endif  
                              </td>
                              <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Weight in LBS</td>
                            <td>
                              @if(isset($last_visit->weight))
                                {{$last_visit->weight}}
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                            <?php $count=0;?>
                          @foreach($product as $key =>$val)
                          <tr>
                            <td style="font-weight: bold;">Products</td>
                            <td>
                              @if(isset($last_visit->products))
                                {{$given_products[$count]->item_name}}
                              @endif  
                            </td>
                            <td style="font-weight: bold;">Quantity</td>
                            <td>{{$quantity[$count]}}</td>
                          </tr>
                          <?php $count++;?>
                          @endforeach
                          <tr>
                            <td style="font-weight: bold;">Full Payment</td>
                            <td>
                              @if(isset($last_visit->full_payment))
                                {{$last_visit->full_payment}}
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Payment Recieved</td>
                            <td>
                              @if(isset($last_visit->payment_recieved))
                                {{$last_visit->payment_recieved}}
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Balance</td>
                            <td>
                              @if(isset($last_visit->balance))
                                {{$last_visit->balance}}
                              @endif  
                            </td>
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
                          <div class="col-md-4">
                            <label>Present Weight</label>
                            <input name="present_weight" type="number" min="1" type="text" class="form-control" required="">
                          </div>
                          <div class="col-md-4">
                            <label>Result</label>
                            <input name="result" type="number" min="1" type="text" class="form-control" required="" >
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-4">
                            <label>Weight in LBS</label>
                            <input name="weight" type="number" min="1" type="text" class="form-control" required="" >
                          </div>
                          <div class="col-md-4">
                            <label>Full Payment</label>
                            <input name="full_payment" type="number" min="1" id="full_payment" type="text" class="form-control" required="" >
                          </div>
                          <div class="col-md-4">
                            <label>Payment Recieved</label>
                            <input name="payment_recieved"  type="text" id="payment_recieved" class="form-control" required="" >
                          </div>
                          <div class="col-md-4">
                            <label>Balance</label>
                            <input name="balance" type="number" id="balance" type="text" class="form-control" required="" >
                          </div>
                          {{-- hidden fields for the databale --}}
                          <input type="hidden" name="gender" value="{{$gender}}">
                          <input type="hidden" name="user_id" value="{{$user_id}}">

                          <div id="clone_div">
                            <div class="col-md-6">
                              <label>Products</label>
                              <select name="product[]" required="">
                                <option value="0">Select product</option>
                                @foreach($products as $key => $val)
                                <option value="{{$val->id}}">{{$val->item_name}}</option>
                                @endforeach
                              </select> 
                            </div>
                            <div class="col-md-4 " >
                              <label>quantity</label>
                              <input name="product_quantity[]" id="form3PostalCode" type="text" class="form-control" required="" >
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
                  <h4>Male <span class="semi-bold">Monitoring</span></h4>
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
                        <th>Date of visit</th>
                        <th>Present Weight</th>
                        <th>Result</th>
                        <th>Weight in LBS</th>
                        <th>Products</th>
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