<div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <img src="{{URL('/')}}/backend/assets/img/profiles/avatar.jpg" alt="" data-src="{{URL('/')}}/backend/assets/img/profiles/avatar.jpg" data-src-retina="{{URL('/')}}/backend/assets/img/profiles/avatar2x.jpg" width="69" height="69" />
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username">{{Auth::user()->name}}</div>
              <div class="status">Life goes on...</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">BROWSE <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>

            <li>
              <li class=""><a href=""><i class="material-icons">home</i> <span class="title">Dashboard</span></a>
            </li>
            
            <li class="   "> <a href="index.html"><i class="material-icons">home</i> <span class="title">Clients</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('register')}}" > Register client</a> </li>
                <li class=""> <a href="{{route('clientList')}}"> Clients  <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
              </ul>
            </li>
             <li class="   "> <a href="index.html"><i class="material-icons">home</i> <span class="title">Reception</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li ><a href="{{route('basicClient')}}"> <span class="title">Reception client info</span> <span class="label label-important  "></span></a> </li>
                <li class=""> <a href="{{route('receptionClientList')}}"> Reception client list </a></li>
              </ul>
            </li>
             <li>
              <li class="   "> <a href="#"><i class="material-icons">home</i> <span class="title">Products</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('addItems')}}" > Add product</a> </li>
                <li class=""> <a href="{{route('listItems')}}"> List product <span class=" label label-info pull-right m-r-30">NEW</span></a></li>

              </ul>
            </li>
            <li> <a href="{{route('staff.index')}}"><i class="material-icons">home</i> <span class="title">Staff</span> <span class="selected"></span> </a></li>
            <li>
              <li class="   "> <a href="index.html"><i class="material-icons">settings_phone</i> <span class="title">Inquiries</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('addInquiries')}}" > Add Inquiries</a> </li>
                <li class=""> <a href="{{route('inquiryCalls')}}"> Inquiry Calls  <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>
            <li>
            </li>

             <li>
              <li class="   "> <a href="index.html"><i class="material-icons">call missed</i> <span class="title">Missed Calls</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('addmissedCalls')}}" > Add Missed Calls</a> </li>
                <li class=""> <a href="{{route('missedCalls')}}"> Missed Calls  <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>


             <li>
              <li class="   "> <a href="index.html"><i class="material-icons">message</i> <span class="title">Facebook Messages</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('addfbMsg')}}" > Add Facebook Messages</a> </li>
                <li class=""> <a href="{{route('fbMessages')}}"> Facebook Messages <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>

            <li>
              <li class="   "> <a href="index.html"><i class="material-icons">list</i> <span class="title">Vcita Sheets</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('vicitsSheets')}}" > Add Vcita Sheets</a> </li>
                <li class=""> <a href="{{route('vcitaSheets')}}"> Vcita Sheets <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>

            <li class="   "> <a href="#"><i class="material-icons">list</i> <span class="title">TCS Delivery</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li class=""> <a href="{{route('addDelivery')}}"> Add Delivery </a></li>
                <li class=""> <a href="{{route('list_delivery')}}"> List Delivery </a></li>
              </ul>
               <li class="   "> <a href="#"><i class="material-icons">list</i> <span class="title">Reporting</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li class=""> <a href="{{route('productReport')}}"> Product Report</a></li>
                <li class=""> <a href="{{route('packageReport')}}">Package Report </a></li>
                <li class=""> <a href="{{route('tcsReport')}}">TCS Delivery Report </a></li>
                <li class=""> <a href="{{route('monthlyReport')}}">Monthly Earning Report </a></li>
                <li class=""> <a href="{{route('new_customerReport')}}">Monthly New Customer Report </a></li>
              </ul>

            <li>
              <li class="   "> <a href="index.html"><i class="material-icons">list</i> <span class="title">Visitors Sheet</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('add_visitorSheets')}}" > Add Visitor Sheets</a> </li>
                <li class=""> <a href="{{route('visitorSheets')}}"> Visitors Sheet <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>

             <li>
              <li class="   "> <a href="index.html"><i class="material-icons">list</i> <span class="title">Weber Sheet</span> <span class="selected"></span> <span class="arrow  open "></span> </a>
              <ul class="sub-menu">
                <li > <a href="{{route('add_visitorSheets')}}" > Add Visitor Sheets</a> </li>
                <li class=""> <a href="{{route('weberSheets')}}">Weber Sheets <span class=" label label-info pull-right m-r-30">NEW</span></a></li>
                <li> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
              </li>
              </ul>
            </li>

            <li>
              <a href="{{route('setting')}}"> <i class="material-icons">settings</i> <span class="title">setting</span> {{-- <span class=" badge badge-disable pull-right ">203</span --}}
              </a>
            </li>


          </ul>
          
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="progress transparent progress-small no-radius no-margin">
          <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
        </div>
        <div class="pull-right">
          <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
          <a href="{{route('logout')}}"><i class="material-icons">power_settings_new</i></a></div>
      </div>