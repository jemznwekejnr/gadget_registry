<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'search_history';

    protected $fillable = [
        'searchlevel',
        'serialno',
        'type',
        'manufacturer',
        'model',
        'manufactureyear',
        'registrationyear',
        'devicestatus',
        'deviceid',
        'owner',
        'searchlocation',
        'searchstatus',
    ];
}
