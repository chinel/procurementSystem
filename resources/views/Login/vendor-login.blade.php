<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Meta -->
    <meta name="description" content="">
    <meta name="author" content="">


    <title></title>



      <link href="{{asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
      <link href="{{asset('lib/Ionicons/css/ionicons.css')}}" rel="stylesheet">
      <link href="{{asset('lib/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">

      <link rel="stylesheet" href="{{asset('css/katniss.css')}}">
  </head>

  <body>

    <div class="signpanel-wrapper">

      <div class="signbox">
        <div class="signbox-header">
          <h4>Vendor Portal</h4>
          <h4>Procurement System</h4>
               @if(Session::has('message'))
          <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('message')}}
          </div>

        @endif
        </div><!-- signbox-header -->
       <form action="{{url('auth/login')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">


          <div class="signbox-body">
                      <label class="form-control-label" style="font-weight: bold;">Login</label>
          <div class="input-group">
         <span class="input-group-addon"><i class="icon ion-person tx-16 lh-0 op-6"></i></span>
           <input type="email" class="form-control" placeholder="Email" required="" name="email">
            </div>
         
         <div class="input-group mg-t-20">
         <span class="input-group-addon"><i class="icon ion-locked tx-16 lh-0 op-6"></i></span>
           <input type="password" class="form-control" placeholder="password" required="" name="password">
            </div>

          <button class="btn btn-dark btn-block mg-t-20" type="submit"> Log in</button>
          <div class="tx-center  pd-10 mg-t-40">Forgot password? <a href="#">Please consult your administrator</a></div>
        </div><!-- signbox-body -->
  </form>
      </div><!-- signbox -->
    </div><!-- signpanel-wrapper -->

    <script src="{{asset('lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
  </body>
</html>
