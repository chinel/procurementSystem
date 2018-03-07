<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllRequest extends Model
{
    protected $fillable = [
        'id','title', 'sector', 'open_date','close_date','comments',
    ];

    
}
