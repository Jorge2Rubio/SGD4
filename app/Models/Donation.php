<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'checkout_id',
        'donor_name',
        'email',
        'amount',
        'status',
    ];
}
