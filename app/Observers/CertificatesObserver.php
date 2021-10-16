<?php

namespace App\Observers;

use App\Certificates;

class CertificatesObserver
{
    /**
     * Handle the certificates "created" event.
     *
     * @param  \App\Certificates  $certificates
     * @return void
     */
    public function created(Certificates $certificates)
    {
        //
    }

    /**
     * Handle the certificates "updated" event.
     *
     * @param  \App\Certificates  $certificates
     * @return void
     */
    public function updated(Certificates $certificates)
    {
        //
    }

    /**
     * Handle the certificates "deleted" event.
     *
     * @param  \App\Certificates  $certificates
     * @return void
     */
    public function deleted(Certificates $certificates)
    {
        //
    }

    /**
     * Handle the certificates "restored" event.
     *
     * @param  \App\Certificates  $certificates
     * @return void
     */
    public function restored(Certificates $certificates)
    {
        //
    }

    /**
     * Handle the certificates "force deleted" event.
     *
     * @param  \App\Certificates  $certificates
     * @return void
     */
    public function forceDeleted(Certificates $certificates)
    {
        //
    }
}
