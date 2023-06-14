<?php

namespace App\Observers;

use App\Models\Property;

class PropertyObserver
{
    /**
     * Handle the Property "created" event.
     */
    public function created(Property $property): void
    {
        //
    }

    public function creating(Property $property)
    {
        if (auth()->check()) {
            $property->owner_id = auth()->id();
        }

        // only for test, then will be used Google Maps API
        $property->lat = rand(1, 10);
        $property->long = rand(1, 10);
    }

    /**
     * Handle the Property "updated" event.
     */
    public function updated(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     */
    public function deleted(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     */
    public function restored(Property $property): void
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     */
    public function forceDeleted(Property $property): void
    {
        //
    }
}
