<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>UFC Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="{{URL('/')}}/backend/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{URL('/')}}/backend/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="{{URL('/')}}/backend/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="{{URL('/')}}/backend/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
  </head>
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="error-body no-top">
    <div class="container">
      <div class="row login-container column-seperation">
        <div class="col-md-5 col-md-offset-1">
         <h2>
        <a href="">
            <img src="{{URL('/')}}/backend/assets/img/logo.png"  alt="" data-src="{{URL('/')}}/backend/assets/img/logo.png" data-src-retina="{{URL('/')}}/backend/assets/img/logo.png" width="250" height="105" />
          </a>
      </h2>
      <p style="font-weight: bold">
            GET THE LIFE YOU WANT AND THE BODY YOU DESERVE
            <br>          </p>
          <br>
        </div>
        <div class="col-md-5">
          <br>
          <form action="{{route('validate_login')}}" class="login-form validate" id="login-form" method="post" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
              @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
              @endif
              <div class="form-group col-md-10">
                <label class="form-label">Email / Phone</label>
                <input class="form-control" id="txtusername" name="user" type="text" required>
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-10">
                <label class="form-label">Password</label> <span class="help"></span>
                <input class="form-control" id="txtpassword" name="password" type="password" required>
              </div>
            </div>
            <div class="row">
              <div class="control-group col-md-10">
                <div class="checkbox checkbox check-success">
                  <a href="#">Trouble login in?</a>&nbsp;&nbsp;
                  <input id="checkbox1" type="checkbox" value="1">
                  <label for="checkbox1">Keep me reminded</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10">
                <input class="btn btn-primary btn-cons pull-right" type="submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END CONTAINER -->
    <script src="{{URL('/')}}/backend/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="{{URL('/')}}/backend/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{URL('/')}}/backend/webarch/js/webarch.js" type="text/javascript"></script>
    <script src="{{URL('/')}}/backend/assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>