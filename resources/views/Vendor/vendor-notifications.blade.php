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
    <link href="{{asset('lib/highlightjs/github.css')}}" rel="stylesheet">
    <link href="{{asset('lib/datatables/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet">


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
        <div class="row row-sm" style="width: 100%">
          <div class="col-lg-8"><h5>Notifications</h5></div>
  
        </div>
      </div><!-- kt-pagetitle -->

      <div class="kt-pagebody">

        <div class="card pd-20 pd-sm-40">

<div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Vendor</th>
                  <th>Date</th>
                  <th>Notification Type</th>
                  <th class="wd-25p" style="text-align: center;"> Action</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               @foreach($Notifications as $Notification)
                <tr>
                  <td>{{$Notification->id}}</td>
                  <td>{{$Notification->company_name}}</td>
                  <td>{{$Notification->created_at}}</td>
                  <td>{{$Notification->type}}</td>
                  <td style="text-align: center;"><a href="{{url('/vendor/viewNotification/'.$Notification->id)}}"><i class="fa fa-eye fa-2x" style="color: green;"></i></a> &nbsp;</td>
                  <td></td>
                </tr>
               @endforeach
                
              
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

        



      </div><!-- kt-pagebody -->
      <div class="kt-footer">
        
      </div><!-- kt-footer -->
    </div><!-- kt-mainpanel -->

   <script src="{{asset('lib/jquery/jquery.js')}}"></script>
   <script src="{{asset('lib/popper.js/popper.js')}}"></script>
   <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
   <script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
   <script src="{{asset('lib/moment/moment.js')}}"></script>
   <script src="{{asset('lib/highlightjs/highlight.pack.js')}}"></script>
   <script src="{{asset('lib/datatables/jquery.dataTables.js')}}"></script>
   <script src="{{asset('lib/datatables-responsive/dataTables.responsive.js')}}"></script>
   <script src="{{asset('lib/select2/js/select2.min.js')}}"></script>

   <script src="{{asset('js/katniss.js')}}"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>
  </body>
</html>
