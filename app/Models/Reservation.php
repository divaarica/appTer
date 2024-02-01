<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'resNumber',
        'start',
        'end',
        'nbPersons',
        'date',
        'qrcode_expiration',
        'price',
        'state',
        'ligne_id',
        'class_id',
        'user_id',
    ];

    public function startRegion()
    {
        return $this->belongsTo(Region::class, 'start');
    }

    public function endRegion()
    {
        return $this->belongsTo(Region::class, 'end');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }
}
