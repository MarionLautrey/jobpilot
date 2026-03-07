<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    public function offres()
    {
        
        return $this->HasMany(Offre::class, 'entreprise_id');
    }

    protected $fillable = [
        'nom',
        'adresse',
    ];
}
