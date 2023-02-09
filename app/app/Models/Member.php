<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone_number', 'email_address', 'is_employed', 'birthday', 'iban'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }
}
