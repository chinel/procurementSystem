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
            <div class="col-lg-8"><h5>Bid Report</h5></div>
      
        </div>
    </div><!-- kt-pagetitle -->

    <div class="kt-pagebody">
  @if(Session::has('success'))
          <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            {{Session::get('success')}}
          </div>

        @endif
        <div class="card pd-20 pd-sm-40">

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Sector</th>
                        <th>Request</th>
                        <th>Bid Amount</th>
                        <th>Bid Duration</th>
                        <th>Status</th>
                        <th>Files</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($bids as $index => $bid)
                    <tr>
                        <td>00{{$index + 1}}</td>
                        <td>{{$bid->sector}}</td>
                        <td>{{$bid->title}}</td>
                        <td>₦{{$bid->amount}}</td>
                        <td>{{$bid->duration}}</td>
                        <td>{{$bid->status}}</td>
                        <td>{{$bid->countFiles($bid->id)}}</td>
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
