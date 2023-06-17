<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'manufacturer';

    protected $fillable = [
        'id',
        'type',
        'manufacturer',
        'created_by',
        'created_at'
    ];
}

