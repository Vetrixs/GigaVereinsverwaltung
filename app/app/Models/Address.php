<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'street',
        'city',
        'state',
        'postal_code'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}

