<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'status',
        'work_hours',
    ];
    public static $statusList = [
        'domyslny'=> 'white',
        'ok'=> 'green',
        'info'=> 'blue',
        'slabe'=> 'orange',
        'trudne'=> 'red',
    ];
}
