<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function redirect;
use Illuminate\Support\Facades\Auth;
use App\Vendor;
use App\AllRequest;
use App\Attachments;
use App\Bid;
use App\BidAttachment;
use App\Notification;

class AdminController extends Controller
{



    public function adminHome(){


              $vendorId = Vendor::select('id','company_name')->where('user_id','=',\Auth::user()->id)->first();

    $Totalbids = Bid::select('bids.id','all_requests.sector','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->count();  


    $TotalPendingbids = Bid::select('bids.id','all_requests.sector','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->where('bids.status','=','pending')
           ->count();      


        return view('Admin.index',compact('Totalbids','TotalPendingbids'));
    }


    public function addUser(Request $request){

        $user = new User;
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role = "user";
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->save();

        Session::flash('success','User successfully added');
        return redirect('/admin/users');



    }


    public function viewUsers(){
        $users = User::where('role','=' ,"user")->orderBy('created_at','desc')->sget();
        return view('Admin.user-list', compact('users'));

}



    public function editUsers($id){

        $user = User::findOrFail($id);

       return view('Admin.edit-users', compact('user'));



    }

    public function updateUsers($id,Request $request){

        $user = User::findOrFail($id);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender  = $request->gender;
        $user->status = $request->status;
        $user->save();


        Session::flash('success','User successfully updated');
        return redirect('/admin/users');

    }

    public function addVendor(Request $request){

        $randstr = "";
        $length = 16;
        for ($i = 0; $i < $length; $i++) {
            $randnum = mt_rand(0, 61);
            if ($randnum < 10) {
                $randstr .= chr($randnum + 48);
            } else if ($randnum < 36) {
                $randstr .= chr($randnum + 55);
            } else {
                $randstr .= chr($randnum + 61);
            }
        }


        $email = $request->email;
        $contact_person = $request->contact_person;
        $company_name = $request->company_name;
        $phone = $request->phone;



       $user = new User;
       $user->email = $request->email;
       $user->role = "vendor";
        $user->phone = $request->phone;
       $user->password = bcrypt($randstr);
       $user->save();

       $lastInsertId = $user->id;

       $vendor = new Vendor;
       $vendor->company_name = $request->company_name;
       $vendor->contact_person = $request->contact_person;
      // $vendor->phone = $request->phone;
       $vendor->user_id = $lastInsertId;
       $vendor->save();

        //dd();

         \Mail::to($request->email)
            ->send(new \App\Mail\VendorSend($email, $contact_person, $company_name, $randstr, $phone));


        Session::flash('success','Vendor Successfully registered');
        return redirect('/admin/vendors');


    }



    public function viewVendors(){
        $vendors = User::select('vendors.id', 'company_name','contact_person','phone','users.email','vendors.created_at')
                                ->join('vendors','users.id','=','vendors.user_id')
                                ->orderBy('users.created_at','desc')
                                ->get();

        return view('Admin.vendors', compact('vendors'));

    }

    public function editVendors($id){

        $vendor = Vendor::findOrFail($id);
        $user = User::select('email','phone')
                             ->where('id','=', $vendor->user_id)
                             ->get();

        return view('Admin.edit-vendors', compact('vendor','user'));



    }


    public function updateVendors($id,Request $request){

        $vendor = Vendor::findOrFail($id);

        $vendor->company_name = $request->company_name;
        $vendor->contact_person = $request->contact_person;
        $vendor->phone = $request->phone;
        $vendor->save();

        $userId = $vendor->user_id;

        $user = User::findOrFail($userId);
        $user->phone = $request->phone;
        $user->save();


        Session::flash('success','Vendor successfully updated');
        return redirect('/admin/vendors');

    }


    public function addRequest(Request $request){

        $allRequest = new AllRequest;
        $allRequest->title = $request->title;
        $allRequest->sector = $request->sector;
        $allRequest->open_date = $request->open_date;
        $allRequest->close_date = $request->close_date;
        $allRequest->comments = $request->comments;
        $allRequest->save();

        $lastinsert = $allRequest->id;

        foreach ($request->uploads as $upload) {
            $filename = $upload->store('public/uploads');
            Attachments::create([
            'all_request_id' => $lastinsert,
            'upload' => $filename
            ]);
        }



        Session::flash('success','Request successfully added');
        return redirect('/admin/allRequests');

    }



   public function viewAllRequests(Request $request){

    $allRequests = AllRequest::all();

     return view('Admin.requests', compact('allRequests'));


   }


   public function viewARequest($id){


    $aRequest = AllRequest::findOrFail($id);

    $allAttachements = Attachments::where('all_request_id','=',$id)->get();

    return view('Admin.view-request',compact('aRequest','allAttachements'));

   }


   public function downloadFile($id){

    $allAttachements = Attachments::where('id','=',$id)->first();
    return response()->download(storage_path('app') . '/' . $allAttachements->upload);
   }


   public function editRequest($id){


    $aRequest = AllRequest::findOrFail($id);

    $allAttachements = Attachments::where('all_request_id','=',$id)->get();

    return view('Admin.edit-request',compact('aRequest','allAttachements'));

   }


   public function editAttachment($id){

    return view('Admin.replace-file', compact('id'));

   }


   public function updateRequests($id,Request $request){

        $allRequest= AllRequest::findOrFail($id);
 
        $allRequest->title = $request->title;
        $allRequest->sector = $request->sector;
        $allRequest->open_date = $request->open_date;
        $allRequest->close_date = $request->close_date;
        $allRequest->comments = $request->comments;
        $allRequest->save();



        Session::flash('success','Request successfully updated');
        return redirect('/admin/allRequests');

    }


       public function updateAttachment($id,Request $request){

        $Attachment= Attachments::findOrFail($id);
 
        $filename = $request->upload->store('public/uploads');
        $Attachment->upload = $filename;
        $Attachment->save();

        $AttachmentRequestId = $Attachment->all_request_id;


        Session::flash('success','Attachment successfully updated');
        return redirect('/admin/editRequest/'. $AttachmentRequestId.'/edit');

    }


    public function viewApprovals(){

    $bids = Bid::select('bids.id','all_requests.sector','vendors.company_name','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->join('vendors','bids.vendor_id','=','vendors.id')
           ->get();

    return view('Admin.approvals',compact('bids'));


    }



    public function approveBid($id){
   

     $bid = Bid::findOrFail($id);

     $userid = Vendor::select('company_name','user_id')
                       ->where('id','=',$bid->vendor_id)
                         ->first();

     $requestTitle = AllRequest::select('title')
                      ->where('id','=',$bid->all_request_id)
                         ->first();



    $bid->status = "approved";

    $bid->save();

    $Notification = new Notification;
    $Notification->type = "Bid Approval";
    $Notification->user_id = $userid->user_id;
    $Notification->vendor_id =  $bid->vendor_id;
    $Notification->comments = $userid->company_name . " your bid request for ". $requestTitle->title. " has been approved";
    $Notification->save();


      Session::flash('success','Bid successfully Approved');
        return redirect('/admin/approvals');

    
    }


    public function disapproveBid($id){


    $bid = Bid::findOrFail($id);

     $userid = Vendor::select('company_name','user_id')
                       ->where('id','=',$bid->vendor_id)
                         ->first();

     $requestTitle = AllRequest::select('title')
                      ->where('id','=',$bid->all_request_id)
                         ->first();



    $bid->status = "disapproved";

    $bid->save();

    $Notification = new Notification;
    $Notification->type = "Bid disApproval";
    $Notification->user_id = $userid->user_id;
    $Notification->vendor_id = $bid->vendor_id;
    $Notification->comments = $userid->company_name . " your bid request for ". $requestTitle->title. " was disapproved";
    $Notification->save();


      Session::flash('success','Bid successfully Disapproved');
        return redirect('/admin/approvals');
     

    }


    public function viewBidRequest($id){
     
     $bid = Bid::select('bids.id','bids.amount','bids.duration','bids.comments','vendors.company_name','all_requests.title','bids.status')
           ->join('vendors','bids.vendor_id','=','vendors.id')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->where('bids.id','=', $id)
           ->first();


      $allAttachements  = BidAttachment::where('bid_id','=',$id)->get();
      
      return view('Admin.view-bid', compact('bid','allAttachements'));   

    }




    public function requestBids(){

        $bids = Bid::select('all_requests.sector','all_requests.title','bids.all_request_id')
                       ->join('all_requests','bids.all_request_id','=','all_requests.id')
                       ->distinct('bids.all_request_id')
                       ->get();


           return view('Admin.requests-reports',compact('bids'));                

    }





    public function approvalBids(){


     $bids = Bid::select('all_requests.sector','all_requests.title','vendors.company_name','bids.amount','bids.status')
                 ->join('all_requests','bids.all_request_id','=','all_requests.id')
                 ->join('vendors','bids.vendor_id','=','vendors.id')
                 ->get();

    return view('Admin.approvals-reports',compact('bids'));

    }



    public function allNotifications(){



        $Notifications = Notification::select('notifications.id','notifications.type','notifications.created_at','vendors.company_name')
                         ->join('vendors','notifications.vendor_id','=','vendors.id')
                         ->where('notifications.user_id','=',1)
                         ->get();


         return view('Admin.notifications',compact('Notifications'));                
                         

    }


    public function viewNotification($id){

        $Notifications =  Notification::select('notifications.id','notifications.type','notifications.created_at','vendors.company_name','notifications.comments')
                         ->join('vendors','notifications.vendor_id','=','vendors.id')
                         ->where('notifications.id','=', $id)
                         ->first();


        return view('Admin.view-notifications',compact('Notifications'));


                         
    }











    public function vendorHome(){

      $vendorId = Vendor::select('id','company_name')->where('user_id','=',\Auth::user()->id)->first();

    $Totalbids = Bid::select('bids.id','all_requests.sector','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->where('vendor_id','=', $vendorId->id)
           ->count();  


    $TotalApprovedbids = Bid::select('bids.id','all_requests.sector','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->where('vendor_id','=', $vendorId->id)
           ->where('bids.status','=','approved')
           ->count();      



      return view('Vendor.index',compact('Totalbids','TotalApprovedbids'));

    }



    public function vendorViewAllRequests(Request $request){

    $allRequests = AllRequest::orderBy('created_at', 'desc')->get();;

     return view('Vendor.vendor-request', compact('allRequests'));


   }


      public function vendorViewARequest($id){


    $aRequest = AllRequest::findOrFail($id);

    $allAttachements = Attachments::where('all_request_id','=',$id)->get();

    return view('Vendor.vendor-viewRequest',compact('aRequest','allAttachements'));

   }


   public function vendorBidRequest($id){


   $vendorName = Vendor::select('company_name')->where('user_id','=',\Auth::user()->id)->first();

   return view('Vendor.vendor-bidRequest',compact('vendorName','id'));

   }


   public function vendorRecordBidRequest($id, Request $request){

    $vendorId = Vendor::select('id','company_name')->where('user_id','=',\Auth::user()->id)->first();

    $BidRequest = AllRequest::select('title')->where('id','=',$id)->first();


     $bids = new Bid;
     $bids->all_request_id = $id;
     $bids->vendor_id = $vendorId->id;
     $bids->amount = $request->amount;
     $bids->duration = $request->duration;
     $bids->units = $request->unit;
     $bids->comments = $request->comments;
     $bids->status = "pending";
     $bids->save();

     $lastInsertId = $bids->id;


    foreach ($request->uploads as $upload) {
            $filename = $upload->store('public/uploads');
            BidAttachment::create([
            'bid_id' => $lastInsertId,
            'upload' => $filename
            ]);
        }


     $Notification = new Notification;
     $Notification->type = "Bid Request";
     $Notification->user_id = 1;
     $Notification->vendor_id = $vendorId->id;
     $Notification->comments = $vendorId->company_name . " made a bid request for ". $BidRequest->title;
     $Notification->save();   



   Session::flash('success','Bid Request Successfully made');
        return redirect('/vendor/reports');


   }



   public function vendorBidReports(){

     $vendorId = Vendor::select('id','company_name')->where('user_id','=',\Auth::user()->id)->first();

    $bids = Bid::select('bids.id','all_requests.sector','all_requests.title','bids.amount','bids.duration','bids.status')
           ->join('all_requests','bids.all_request_id','=','all_requests.id')
           ->where('vendor_id','=', $vendorId->id)
           ->get();

    return view('Vendor.vendor-bidReports', compact('bids'));
           
   }


    public function vendorAllNotifications(){



        $Notifications = Notification::select('notifications.id','notifications.type','notifications.created_at','vendors.company_name')
                         ->join('vendors','notifications.vendor_id','=','vendors.id')
                         ->where('notifications.user_id','=',\Auth::user()->id)
                         ->get();


         return view('Vendor.vendor-notifications',compact('Notifications'));                
                         

    }


    public function vendorViewNotification($id){

        $Notifications =  Notification::select('notifications.id','notifications.type','notifications.created_at','vendors.company_name','notifications.comments')
                         ->join('vendors','notifications.vendor_id','=','vendors.id')
                         ->where('notifications.id','=', $id)
                         ->first();


        return view('Vendor.single-notification',compact('Notifications'));


                         
    }





  public function login(Request $request){

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){


            if(\Auth::user()->role == "admin"){
                return redirect('/admin');

            }

            elseif(\Auth::user()->role == "vendor" ){
                return redirect('/vendor');
            }



        }
        else{
           
             return redirect()->back()->with('message', 'Invalid Login details');

        }
    }




    public function logout(){

        Auth::logout();
        return redirect('/');
    }





}
