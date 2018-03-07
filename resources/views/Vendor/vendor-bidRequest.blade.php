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

    
    <link rel="stylesheet" href="{{asset('css/katniss.css')}}">
  </head>

  <body>

   <!-- ##### SIDEBAR LOGO ##### -->
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

    <!-- ##### SIDEBAR MENU ##### -->
    <div class="kt-sideleft">
      <ul class="nav kt-sideleft-menu">
        <li class="nav-item">
          <a href="index.html" class="nav-link active">
            <span>Dashboard</span>
          </a>
        </li><!-- nav-item -->
       
        <li class="nav-item">
          <a href="" class="nav-link">
            <span>Requests</span>
          </a>
        
         
        </li><!-- nav-item -->
        

           <li class="nav-item">
          <a href="" class="nav-link">
            <span>Reports</span>
          </a>
          
     
        </li><!-- nav-item -->


                <li class="nav-item">
          <a href="" class="nav-link">
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
        <a href="{{url('auth/logout')}}" class="nav-link nav-link-profile" data-toggle="dropdown">
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
          <div class="col-lg-8"><h5>Request</h5></div>
        </div>
      </div><!-- kt-pagetitle -->
      <div class="kt-pagebody">

       
        <div class="row row-sm mg-t-20">
         <div class="col-xl-1"></div>
          <div class="col-xl-8 mg-t-25 mg-xl-t-0">
            <div class="card pd-20 pd-sm-40 form-layout form-layout-5" style="border: 0px;">
              <h2  style="text-align: center;">You are Bidding for Request 00{{$id}}</h2>
              <br>
              <form action="{{url('/vendor/bidRequest/'.$id)}}" data-parsley-validate method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row row-xs">
                <label class="col-sm-4 form-control-label"> Vendor Name <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control"  readonly="" value="{{$vendorName->company_name}}">
                </div>
              </div><!-- row -->
              <div class="row row-xs mg-t-20">
                <label class="col-sm-4 form-control-label"> Bid Amount (₦):<span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="Number" class="form-control" placeholder="Amount" required name="amount">
                </div>
              </div>
              <div class="row row-xs mg-t-20">
                <label class="col-sm-4 form-control-label"> Bid Duration(in Months): <span class="tx-danger">*</span></label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <div class="row">
                    <div class="col-sm-6">
                      <input type="Number" class="form-control " placeholder="Duration" required name="duration">
                    </div>
                    <div class="col-sm-6">
                    <input type="Number" class="form-control "  name="unit" placeholder="unit">

                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="row row-xs mg-t-20">
                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Attachments:</label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="file" class="form-control" required name="uploads[]" multiple="">
                  <span>Maximum of 5 files allowed. Please attach the files at once</span>
                </div>
              </div>

              <div class="row row-xs mg-t-20">
                <label class="col-sm-4 form-control-label">Note (Optional): </label>
                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <textarea rows="6" class="form-control" placeholder="Additional Details 20 Chars" name="comments"></textarea>
                </div>
              </div>
              
              
              <div class="row row-xs mg-t-30">
                <div class="col-sm-8 mg-l-auto">
                  <div class="form-layout-footer">
                    <button class="btn btn-default mg-r-5" type="submit">Bid</button>
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
    <script src="{{asset('lib/bootstrap/bootstrap.js')}}"></script>
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
