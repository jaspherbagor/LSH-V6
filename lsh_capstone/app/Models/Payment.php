<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'accommodation_id',
        'gcash_qr',
        'gcash_name',
        'gcash_number',
        'maya_qr',
        'maya_name',
        'maya_number'
    ];
}
