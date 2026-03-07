<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\EntrepriseObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([EntrepriseObserver::class])]
class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
    ];

    // Relation : Une entreprise a plusieurs offres
    public function offres()
    {
        return $this->hasMany(Offre::class, 'entreprise_id');
    }
}
