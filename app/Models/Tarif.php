<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'nbZones',
        'nbPersons',
        'class_id',
        
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'class_id');
    }

}
