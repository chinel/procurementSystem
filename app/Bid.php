<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BidAttachment;

class Bid extends Model
{
    

    protected $fillable = [
        'all_request_id','vendor_id', 'amount', 'duration','units','comments','status'
    ];


     public function countFiles($id){
        $count =  BidAttachment::where('bid_id','=', $id)
            ->count();
        return $count;

    }

    public function countVendors($id){
    	$count = Bid::where('all_request_id','=', $id)
    	            ->count();
    	            return $count;
    }


     public function countApprovals($id){
       $count = Bid::where('all_request_id','=', $id)
                       ->where('status','=','approved')
    	            ->count();
    	            return $count;

    }


      public function countDisapprovals($id){
       $count = Bid::where('all_request_id','=', $id)
                       ->where('status','=','disapproved')
    	            ->count();
    	            return $count;

    }


      public function countPendings($id){
       $count = Bid::where('all_request_id','=', $id)
                       ->where('status','=','pending')
    	            ->count();
    	            return $count;

    }

}
