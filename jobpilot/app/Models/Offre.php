<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\OffreObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([OffreObserver::class])]
class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'job',
        'type',
        'entreprise_id',
        'adresse',
        'date',
        'candidat_id',
    ];

    protected $casts = [
        'date' => 'datetime', // pour manipuler la date facilement
    ];

    // Relations
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
