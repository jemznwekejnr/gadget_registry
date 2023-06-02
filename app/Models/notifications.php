<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'notifications';

    protected $fillable = [
        'id',
        'staff',
        'title',
        'status',
        'location',
        'created_at'
    ];
}
