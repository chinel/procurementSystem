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
    <link href="{{asset('lib/rickshaw/rickshaw.min.css')}}" rel="stylesheet">

    
    <link rel="stylesheet" href="{{asset('css/katniss.css')}}">
  </head>

  <body>

    <!-- ##### SIDEBAR LOGO ##### -->
    <div class="kt-sideleft-header">
      <div class="kt-logo"><a href="#"></a></div>
      <div id="ktDate" class="kt-date-today"></div>
      
    </div><!-- kt-sideleft-header -->

    <!-- ##### SIDEBAR MENU ##### -->
    <div class="kt-sideleft">
      <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
          <a href="{{url('/vendor')}}" class="nav-link active">
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->

        <li class="nav-item">
          <a href="{{url('/vendor/allRequests')}}" class="nav-link">
            <span>Requests</span>
          </a>
        
         
        </li><!-- nav-item -->
        

           <li class="nav-item">
          <a href="{{url('/vendor/reports')}}" class="nav-link">
            <span>Reports</span>
          </a>
          
     
        </li><!-- nav-item -->

       

                <li class="nav-item">
          <a href="{{url('/vendor/allNotifications')}}" class="nav-link">
            <span>Notifications</span>
          </a>
          
        
        </li><!-- nav-item -->

        
      </ul>
    </div><!-- kt-sideleft -->

    <!-- ##### HEAD PANEL ##### -->
    <div class="kt-headpanel">
      <div class="kt-headpanel-left">
        <a id="naviconMenu" href="" class="kt-navicon d-none d-lg-flex"><i class="icon ion-navicon-round"></i></a>
        <a id="naviconMenuMobile" href="" class="kt-navicon d-lg-none"><i class="icon ion-navicon-round"></i></a>
      </div><!-- kt-headpanel-left -->

      <div class="kt-headpanel-right">

        <div class="dropdown dropdown-profile">
        <a href="{{url('auth/logout')}}" class="nav-link nav-link-profile">
            <span class="logged-name"><span class="hidden-xs-down">Vendor</span> <i class="icon ion-power mg-l-3"></i></span>
          </a>
         
        </div><!-- dropdown -->
      </div><!-- kt-headpanel-right -->
    </div><!-- kt-headpanel -->
    <div class="kt-breadcrumb">
      <nav class="breadcrumb">
       
      </nav>
    </div><!-- kt-breadcrumb -->

    <!-- ##### MAIN PANEL ##### -->
    <div class="kt-mainpanel">
      <div class="kt-pagetitle">
        <h5>Dashboard</h5>
      </div><!-- kt-pagetitle -->

      <div class="kt-pagebody">

        <div class="row row-sm">
          <div class="col-lg-12">
            <div class="row row-sm">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body pd-b-0">
                    <h3 class="card-body-title tx-12 tx-spacing-2 mg-b-20">No of bids Made</h3>
                    <h2 class="tx-lato tx-inverse">{{$Totalbids}}</h2>
                  </div><!-- card-body -->
                  <div id="rs1" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div><!-- col-6 -->
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-body pd-b-0">
                    <h6 class="card-body-title tx-12 tx-spacing-2 mg-b-20  tx-success">No of approved bids</h6>
                    <h2 class="tx-lato tx-inverse">{{$TotalApprovedbids}}</h2>
                  </div><!-- card-body -->
                  <div id="rs2" class="ht-50 ht-sm-70 mg-r--1"></div>
                </div><!-- card -->
              </div><!-- col-6 -->
            </div><!-- row -->


          </div><!-- col-8 -->
          
        </div><!-- row -->
      </div><!-- kt-pagebody -->
      
      <div class="kt-footer">

      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->

    <script src="{{asset('lib/jquery/jquery.js')}}"></script>
    <script src="{{asset('lib/popper.js/popper.js')}}"></script>
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
    <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
    <script src="{{asset('lib/moment/moment.js')}}"></script>
    <script src="{{asset('lib/d3/d3.js')}}"></script>
    <script src="{{asset('lib/rickshaw/rickshaw.min.js')}}"></script>
    <script src="{{asset('lib/gmaps/gmaps.js')}}"></script>
    <script src="{{asset('lib/chart.js/Chart.js')}}"></script>

    <script src="{{asset('js/katniss.js')}}"></script>
    <script src="{{asset('js/ResizeSensor.js')}}"></script>
    <script src="{{asset('js/dashboard.js')}}"></script>

  </body>
</html>
