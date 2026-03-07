<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

        public function candidat() {
        return $this->belongsTo(Candidat::class);
    }

        public function entreprise() {
        return $this->belongsTo(Entreprise::class);
    }

    protected $fillable = [
        'job',
        'type',
        'entreprise',
        'adresse',
        'date',
    ];

    /* Casting éventuel pour s'assurer que le prix est bien manipulé comme float
    protected $casts = [
        'prix' => 'float',
    ];*/
}