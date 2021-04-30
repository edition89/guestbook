<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Guestbooks extends Model
{
    use HasFactory;

    protected $filable=['username', 'message'];

    public function getCreatedAtAttribute($date){
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s / d.m.Y');
    }
}
