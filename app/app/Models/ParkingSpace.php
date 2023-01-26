<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public static function getFreeSpaces(){
        return env('MAX_PARKING_SPACES')
        -
        (
            count(self::all())
            + env('MIN_FREE_PARKING_SPACES')
            + count(Customer::where('season_parker', 1)->doesntHave('parkingSpace')->get())
        );
    }
}
