<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use Filterable;
    
    protected $fillable = [
        'user_id',
        'payload',
        'event_name'
    ];

    protected $casts =[
        'payload' => 'json',
    ];
  
}
