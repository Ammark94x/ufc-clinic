
<div class="row column-seperation" style="background: white">
                      <div class="col-md-6">
                        <h4>Last visit detail</h4>
                        <?php if(isset($last_visit) && !empty($last_visit)){?>
                        <table class="table table-hover table-condensed" id="example">
                          <tr>
                            <td style="font-weight: bold;">Date of last visit</td>
                            <td>{{$last_visit->dov}}</td>
                            <td style="font-weight: bold;">Next Visit</td>
                            <td>@if(isset($last_visit->next_visit))
                                {{$last_visit->next_visit}}
                              @endif</td>
                            
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
                            <td style="font-weight: bold;">Neck</td>
                            <td>{{$last_visit->neck}} inches</td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Full Payment</td>
                            <td>{{$last_visit->full_payment}}</td>
                            <td style="font-weight: bold;">Weight</td>
                            <td>{{$last_visit->present_weight}}</td>
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
                            <input form="male_monitorForm" name="form3Email" id="form3Email" type="text" class="form-control" placeholder="email@address.com">
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
                            <input form="male_monitorForm" name="dov" id="dov" type="text" class="form-control" value="{{$date}}">
                          </div>
                          <div class="col-md-4">
                            <label>Next Visit</label>
                            <input form="male_monitorForm"   name="next_visit"  type="date"  class="form-control">
                          </div>
                           @if(isset($last_visit->present_weight))
                             <input form="male_monitorForm" type="hidden" value="{{$last_visit->present_weight}}" id="previous_weight">
                          @endif 
                          <div class="col-md-4">
                            <label>Present Weight</label>
                            <input form="male_monitorForm" name="present_weight" type="number" min="1" type="text" id="present_weight" class="form-control" >
                          </div>
                          <div class="col-md-4">
                            <label id="result_label">Weight Result</label>
                            <input form="male_monitorForm" form="male_monitorForm"  readonly="" id="weight_difference" name="result" type="number" min="1" type="text" class="form-control"  >
                          </div>   
                          <div class="col-md-2">
                            <label>Neck</label>
                            <input form="male_monitorForm" name="neck" type="number"  id="neck" type="text" class="form-control" placeholder="inches" >
                          </div>
                          <div class="col-md-2">
                            <label>Chest</label>
                            <input form="male_monitorForm" name="chest" type="number"  id="chest" type="text" class="form-control" placeholder="inches" >
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-2">
                            <label>Side Buns</label>
                            <input form="male_monitorForm" name="side_buns" type="number" id="side_buns"  type="text" class="form-control" placeholder="inches"  >
                          </div>
                          <div class="col-md-2">
                            <label>Waist</label>
                            <input form="male_monitorForm" name="waist" type="number" id="waist"  type="text" class="form-control" placeholder="inches"  >
                          </div>
                          <div class="col-md-2">
                            <label>Hips</label>
                            <input form="male_monitorForm" name="hips"  id="hips" type="text" class="form-control" placeholder="inches"  >
                          </div>
                          <div class="col-md-2">
                            <label>Theighs</label>
                            <input form="male_monitorForm" name="thighs" type="number" id="thighs"  type="text" class="form-control" placeholder="inches"  >
                          </div>
                          <div class="col-md-4" >
                              <label>Arms</label>
                              <input form="male_monitorForm" name="arms" id="arms" type="number" class="form-control" placeholder="inches"  >
                            </div>
                            <div class="col-md-6" >
                              <label>Lower Waist</label>
                              <input form="male_monitorForm" name="lower_waist" id="lower_waist" type="number" class="form-control" placeholder="inches"  >
                            </div>
                            <div class="col-md-4" >
                              <label>Total Inches For Today</label>
                              <input form="male_monitorForm" name="total_inches"  id="total_inches" readonly="" type="number" class="form-control" placeholder="inches"  >
                            </div>
                            @if(isset($last_visit->total_inches) && !empty($last_visit->total_inches))
                            <div class="col-md-4" style="display: none">
                              <label>Inches Reduced</label>
                              <input form="male_monitorForm"  type="hidden"  id="reduced_inches" readonly="" value="{{$last_visit->total_inches}}" type="number" class="form-control" placeholder="inches"  >
                            </div>
                            @endif
                            <div class="col-md-4" >
                              <label>Inches Reduced</label>
                              <input form="male_monitorForm"  type="number"  id="reduced" readonly=""  type="number" class="form-control" placeholder="inches"  >
                            </div>
                          </div>
                          <div class="col-md-6">
                              <label>Package</label>
                              <select form="male_monitorForm" name="package" >
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
                          <input form="male_monitorForm" type="hidden" name="gender" value="{{$gender}}">
                          <input form="male_monitorForm" type="hidden" name="user_id" value="{{$user_id}}">


                          <div id="clone_div">
                            <div class="col-md-6">
                              <label>Products</label>
                              <select form="male_monitorForm" name="product[]">
                                <option>Select product</option>
                                @foreach($products as $key => $val)
                                <option value="{{$val->id}}">{{$val->item_name}}</option>
                                @endforeach
                              </select> 
                            </div>
                            <div class="col-md-4 " >
                              <label>quantity</label>
                              <input form="male_monitorForm" name="product_quantity[]" type="text" class="form-control" >
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
<script src="{{url('/backend')}}/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
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
<script type="text/javascript">
  $(document).on('click','.clone_it',function (){
    alert('');
    $('#clone_div').clone().appendTo('#cloned_div');
  });
</script>