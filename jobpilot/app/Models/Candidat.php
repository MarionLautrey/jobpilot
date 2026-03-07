<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    
    public function offres()
    {
        
        return $this->HasMany(Offre::class, 'candidat_id');
    }
    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'telephone',
        'description',
    ];
}
