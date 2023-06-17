<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Gadgets extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'gadgets';

    protected $fillable = [
        'id',
        'type',
        'manufacturer',
        'model',
        'imei1',
        'imei2',
        'serialno',
        'year',
        'picture',
        'ownersproof',
        'purchasedate',
        'owner',
        'status',
        'created_by',
        'created_at'
    ];
}
