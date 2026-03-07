<?php

namespace App\Observers;

use App\Models\Candidat;
use Illuminate\Support\Facades\Log;

class CandidatObserver
{
    /**
     * Lorsqu'un candidat est créé
     */
    public function created(Candidat $candidat): void
    {
        Log::info('candidat.created', [
            'user_id' => auth()->id(),
            'candidat_id' => $candidat->id,
            'data' => $candidat->toArray(),
            'ip' => request()->ip(),
        ]);
    }

    /**
     * Lorsqu'un candidat est mis à jour
     */
    public function updated(Candidat $candidat): void
    {
        $before = $candidat->getOriginal();
        $after = $candidat->getChanges();

        Log::info('candidat.updated', [
            'user_id' => auth()->id(),
            'candidat_id' => $candidat->id,
            'before' => $before,
            'after' => $after,
            'ip' => request()->ip(),
        ]);
    }

    /**
     * Lorsqu'un candidat est supprimé
     */
    public function deleted(Candidat $candidat): void
    {
        Log::info('candidat.deleted', [
            'user_id' => auth()->id(),
            'candidat_id' => $candidat->id,
            'data' => $candidat->toArray(),
            'ip' => request()->ip(),
        ]);
    }

    /**
     * Lorsqu'un candidat est restauré
     */
    public function restored(Candidat $candidat): void
    {

    }

    /**
     * Lorsqu'un candidat est supprimé définitivement
     */
    public function forceDeleted(Candidat $candidat): void
    {

    }
}
