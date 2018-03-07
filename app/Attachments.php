<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    protected $fillable = [
        'id','all_request_id', 'upload', 
    ];
}
