<?php

namespace App\Observers;

use App\Models\Offre;

class OffreObserver
{
    /**
     * Handle the Offre "created" event.
     */
    public function created(Offre $offre): void
    {
        Log::info('offre.created', [
            'user_id' => auth()->id(),
            'offre_id' => $offre->id,
            'data' => $data,
            'ip' => $request->ip(),
        ]);
    }

    /**
     * Handle the Offre "updated" event.
     */
    public function updated(Offre $offre): void
    {
        abort_unless($offre->candidat_id === auth()->id(), 403);

        $before = $offre->only(['job', 'type', 'adresse']);
        $offre->update($data);
        $after = $offre->only(['job', 'type', 'adresse']);

        Log::info('offre.updated', [
            'user_id' => auth()->id(),
            'offre_id' => $offre->id,
            'before' => $before,
            'after' => $after,
            'ip' => $request->ip(),
        ]);

    }

    /**
     * Handle the Offre "deleted" event.
     */
    public function deleted(Offre $offre): void
    {
        abort_unless($offre->candidat_id === auth()->id(), 403);

        $before = $offre->only(['job', 'type', 'adresse']);
        $offreId = $offre->id;
        $offre->delete();

        Log::info('offre.deleted', [
            'user_id' => auth()->id(),
            'offre_id' => $offreId,
            'before' => $before,
            'ip' => $request->ip(),
        ]);
    }

    /**
     * Handle the Offre "restored" event.
     */
    public function restored(Offre $offre): void
    {
        //
    }

    /**
     * Handle the Offre "force deleted" event.
     */
    public function forceDeleted(Offre $offre): void
    {
        //
    }
}
