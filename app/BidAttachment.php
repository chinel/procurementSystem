<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidAttachment extends Model
{
    protected $fillable = [
        'bid_id','upload', 
    ];
}
