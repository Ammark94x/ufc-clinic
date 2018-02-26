<div class="row column-seperation" style="background: white">

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
                            <td style="font-weight: bold;">Next visit</td>
                            <td>
                              @if(isset($last_visit->next_visit))
                                {{$last_visit->next_visit}}  
                              @endif
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Weight</td>
                            <td>
                              @if(isset($last_visit->present_weight))
                                {{$last_visit->present_weight}}
                              @endif  
                            </td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td style="font-weight: bold;">Weight Result</td>
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
                        <h4>Monitoring Detail</h4>
                        
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
                            <label>Present Weight</label>
                            <input form="male_monitorForm" name="present_weight" type="number" min="1" id="present_weight" class="form-control" required="" placeholder="in Kg">
                          </div>
                          @if(isset($last_visit->present_weight))
                             <input type="hidden" value="{{$last_visit->present_weight}}" id="previous_weight">
                          @endif 
                          <div class="col-md-4">
                            <label>Next Visit</label>
                            <input form="male_monitorForm" name="next_visit"  type="date" id="present_weight" class="form-control" required="">
                          </div>
                          <div class="col-md-4">
                            <label id="result_label">Weight Result</label>
                            <input form="male_monitorForm"  readonly="" id="weight_difference" name="result" type="number" min="1" type="text" class="form-control"  >
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-4">
                            <label>Weight in LBS</label>
                            <input form="male_monitorForm" name="weight" type="number" id="weight" min="1" type="text" class="form-control" required="" readonly="">
                          </div>
                          {{-- <div class="col-md-4">
                            <label>Full Payment</label>
                            <input form="male_monitorForm" name="full_payment" type="number"  id="full_payment" type="text" class="form-control"  >
                          </div>
                          <div class="col-md-4">
                            <label>Payment Recieved</label>
                            <input form="male_monitorForm" name="payment_recieved"  type="text" id="payment_recieved" class="form-control"  >
                          </div>
                          <div class="col-md-4">
                            <label>Balance</label>
                            <input form="male_monitorForm" name="balance" type="number" id="balance" type="text" class="form-control" >
                          </div> --}}
                          <div class="col-md-6">
                              <label>Package</label>
                              <select name="package" required="" form="male_monitorForm">
                                <option >Select package</option>
                                @for($i=1;$i<=12;$i++)
                                <option value="{{$i}} month">{{$i}} month</option>
                                @endfor
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
                              <select name="product[]"  form="male_monitorForm">
                                <option value="">Select product</option>
                                @foreach($products as $key => $val)
                                <option value="{{$val->id}}">{{$val->item_name}}</option>
                                @endforeach
                              </select> 
                            </div>
                            <div class="col-md-4 " >
                              <label>Quantity</label>
                              <input form="male_monitorForm" name="product_quantity[]" id="form3PostalCode" type="text" class="form-control" required="" >
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
                      <div class="pull-right" style="margin-top: 10px">
                      <input form="male_monitorForm" type="submit" class="btn btn-danger btn-cons"><i class="icon-ok"></i>
                        <a class="btn btn-white btn-cons" href="{{route('clientList')}}">Cancel</a>
                      </div>
                    </div>
                    <script src="{{url('/backend')}}/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
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