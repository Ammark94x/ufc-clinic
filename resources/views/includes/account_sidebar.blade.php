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
            <li class=""><a href=""><i class="material-icons">home</i> <span class="title">Dashboard</span></a>
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