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
    <link href="{{asset('lib/select2/css/select2.min.css')}}" rel="stylesheet">

    <link href="{{asset('lib/spectrum/spectrum.css')}}" rel="stylesheet">

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
          <a href="{{url('/admin')}}" class="nav-link active">
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="{{url('/admin/vendors')}}" class="nav-link">
            <span>Vendors</span>
          </a>
        
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="{{url('/admin/allRequests')}}" class="nav-link">
            <span>Requests</span>
          </a>
        
         
        </li><!-- nav-item -->
        <li class="nav-item">
          <a href="{{url('/admin/approvals')}}" class="nav-link">
            <span>Approvals</span>
          </a>
          
        
        </li><!-- nav-item -->

           <li class="nav-item">
          <a href="{{url('/admin/allRequestsReports')}}" class="nav-link">
            <span>Reports</span>
          </a>
          
     
        </li><!-- nav-item -->

          <li class="nav-item">
          <a href="{{url('/admin/users')}}" class="nav-link">
            <span>Users</span>
          </a>
          
    
        </li><!-- nav-item -->

                <li class="nav-item">
          <a href="{{url('/admin/allNotifications')}}" class="nav-link">
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
                <span class="logged-name"><span class="hidden-xs-down">Admin</span> <i class="icon ion-power mg-l-3"></i></span>
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
          <div class="col-lg-8"><h5>Vendor List</h5></div>
          <div class="col-lg-4"><h6><a href="{{url('/admin/addVendor')}}" class="pull-right btn btn-default"><i class="fa fa-plus"></i> Add Vendor</a></h6></div>
        </div>
      </div><!-- kt-pagetitle -->
    <div class="kt-pagebody">


        <div class="row row-sm mg-t-20">
            <div class="col-xl-1"></div>
            <div class="col-xl-8 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5" style="border: 0px;">
                    <h2  style="text-align: center;">Edit Vendor</h2>
                    <br>
                    <form action="{{url('admin/updateVendor/'.$vendor->id)}}" data-parsley-validate method="post">
                        <input  type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"> Company Name <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Company Name" required name="company_name" value="{{$vendor->company_name}}">
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Phone Number:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="phone" class="form-control" placeholder="Phone Number" required name="phone" value="{{$user[0]->phone}}">
                            </div>
                        </div>
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Contact Person:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" placeholder="Contact Person" required name="contact_person" value="{{$vendor->contact_person}}">
                            </div>
                        </div>
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Email:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="email" class="form-control" placeholder="Email address" required name="email" value="{{$user[0]->email}}" readonly>
                            </div>
                        </div>

                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button class="btn btn-default mg-r-5" type="submit">Submit Form</button>
                                    <button class="btn btn-danger" type="reset">Cancel</button>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
            <div class="col-xl-3"></div>
        </div><!-- row -->



    </div><!-- kt-pagebody -->
    <div class="kt-footer">

    </div><!-- kt-footer -->
</div><!-- kt-mainpanel -->

<script src="{{asset('lib/jquery/jquery.js')}}"></script>
<script src="{{asset('lib/popper.js/popper.js')}}"></script>
<script src="{{aaset('lib/bootstrap/bootstrap.js')}}"></script>
<script src="{{asset('lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js')}}"></script>
<script src="{{asset('lib/moment/moment.js')}}"></script>
<script src="{{asset('lib/highlightjs/highlight.pack.js')}}"></script>
<script src="{{asset('lib/select2/js/select2.min.js')}}"></script>
<script src="{{asset('lib/parsleyjs/parsley.js')}}"></script>


<script src="{{asset('js/katniss.js')}}"></script>
<script>
    $(function(){
        'use strict';

        $('.select2').select2({
            minimumResultsForSearch: Infinity
        });

        $('#selectForm').parsley();
    })
</script>
</body>
</html>
