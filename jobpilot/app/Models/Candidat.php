<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\CandidatObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CandidatObserver::class])]
class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'telephone',
        'description',
    ];

    // Relation : un candidat peut avoir plusieurs offres
    public function offres()
    {
        return $this->hasMany(Offre::class, 'candidat_id');
    }
}
