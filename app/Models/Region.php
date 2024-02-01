<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'zone_id',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    public function reservations(){
        
        return $this->hasMany(Reservation::class);
    }
}
