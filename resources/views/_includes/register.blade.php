@extends('layouts.frontend')
@section('title','Create Listing | Ship Place')
@section('content')
<section class="ad-breadcrumb parallex">
    <div class="container page-banner">
      <div class="row">
           <div class="col-sm-6 col-md-6">
              <h1>Create Shipment Listing</h1>
           </div>
           <div class="col-sm-6 col-md-6">
              <ol class="breadcrumb pull-right">
                 <li><a href="{{url('/')}}">Home</a></li>
                 <li><a href="">shipment</a></li>
                 <li class="active">Shipment Listing</li>
              </ol>
           </div>
       </div>
    </div>
 </section>
 <section class="post-ad light-blue">
    <div class="container">
       <div class="row">
          <div class="col-md-8 col-sm-12 col-xs-12 nopadding">
            @include('forms.vehicle')
          </div>
          <div class="col-md-4 col-sm-12 col-xs-12">
             <aside>
                <div class="widget">
                   <div class="widget-heading"><span class="title">Ad Posting Rules</span></div>
                   <p>Posting an ad on AdZone is free! However, all ads must follow our rules:</p>
                   <ul class="ad-rules">
                      <li>Make sure you post in the correct category. </li>
                      <li> Do not post the same ad more than once or repost an ad within 48 hours.</li>
                      <li> Do not upload pictures with watermarks. </li>
                      <li> Dummy text of the printing and type setting industry. </li>
                      <li>When an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>
                      <li>Lorem Ipsum has been the industry's standard dummy text ever.</li>
                   </ul>
                </div>                        
             </aside>
          </div>
       </div>
    </div>
 </section>
 <section class="call-to-action-1">
    <div class="container">
       <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
             <div class="col-md-10 col-sm-12 col-xs-12">
                <i class="icon-trophy"></i>
                <div class="heading-detail">
                   <h3>World’s Best Classified Website Template</h3>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
                </div>
             </div>
             <div class="col-md-2 col-sm-12 col-xs-12"> <a class="btn btn-default btn-block" href="">Buy Now <i class="fa fa-angle-double-right"></i></a> </div>
          </div>
       </div>
    </div>
 </section>
 @endsection
 @section('customScripts')
 <script type="text/javascript">
    $(document).ready(function() {
      $("#add-more").on('click',function(){
          $(".vehicle-info").clone().removeClass('vehicle-info').appendTo('.vehicles');
        });
    });
 </script>
 @stop