<?php

namespace App\Providers;

use App\Models\bukuTamu;
use Illuminate\Support\ServiceProvider;
use App\Models\pendaftar;
use App\Models\Peminat;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Fetch the most recent records from both tables based on the highest no_reg
    $latestPendaftar = Pendaftar::latest('no_reg')->first();
    $latestPeminat = Peminat::latest('no_reg')->first();

    // Determine which record has a higher no_reg value
    $latestRecord = null;

    if (
        $latestPendaftar !== null
        && ($latestPeminat === null || $latestPendaftar->no_reg > $latestPeminat->no_reg)
    ) {
        $latestRecord = $latestPendaftar;
    } elseif ($latestPeminat !== null) {
        $latestRecord = $latestPeminat;
    }

    // Share the variable with all views
    View::share('latestRecord', $latestRecord);

    // Fetch counts of records from both tables
    $pendaftarCount = Pendaftar::count();
    $peminatCount = Peminat::count();
    $bukuTamuCount = BukuTamu::count(); // Make sure to use the correct case

    // Share the counts with all views
    View::share('pendaftarCount', $pendaftarCount);
    View::share('peminatCount', $peminatCount);
    View::share('bukuTamuCount', $bukuTamuCount);
}

}
