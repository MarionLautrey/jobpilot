<?php

namespace App\Observers;

use App\Models\Entreprise;
use Illuminate\Support\Facades\Log;

class EntrepriseObserver
{
    public function created(Entreprise $entreprise): void
    {
        $userId = auth()->id() ?: 'guest';
        $ip = request()?->ip() ?: 'cli';

        Log::info('entreprise.created', [
            'user_id' => $userId,
            'entreprise_id' => $entreprise->id,
            'data' => $entreprise->toArray(),
            'ip' => $ip,
        ]);
    }

    public function updated(Entreprise $entreprise): void
    {
        $before = $entreprise->getOriginal();
        $after = $entreprise->getChanges();
        $userId = auth()->id() ?: 'guest';
        $ip = request()?->ip() ?: 'cli';

        Log::info('entreprise.updated', [
            'user_id' => $userId,
            'entreprise_id' => $entreprise->id,
            'before' => $before,
            'after' => $after,
            'ip' => $ip,
        ]);
    }

    public function deleted(Entreprise $entreprise): void
    {
        $userId = auth()->id() ?: 'guest';
        $ip = request()?->ip() ?: 'cli';

        Log::info('entreprise.deleted', [
            'user_id' => $userId,
            'entreprise_id' => $entreprise->id,
            'data' => $entreprise->toArray(),
            'ip' => $ip,
        ]);
    }

    public function restored(Entreprise $entreprise): void
    {
        $userId = auth()->id() ?: 'guest';
        $ip = request()?->ip() ?: 'cli';

        Log::info('entreprise.restored', [
            'user_id' => $userId,
            'entreprise_id' => $entreprise->id,
            'data' => $entreprise->toArray(),
            'ip' => $ip,
        ]);
    }

    public function forceDeleted(Entreprise $entreprise): void
    {
        $userId = auth()->id() ?: 'guest';
        $ip = request()?->ip() ?: 'cli';

        Log::info('entreprise.forceDeleted', [
            'user_id' => $userId,
            'entreprise_id' => $entreprise->id,
            'data' => $entreprise->toArray(),
            'ip' => $ip,
        ]);
    }
}
