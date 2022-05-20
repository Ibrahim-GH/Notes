<?php

namespace App\Providers;

use App\Repository\NoteApiInterface;
use App\Repository\NoteApiRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\NoteInterface;
use App\Repository\NoteRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(NoteInterface::class, NoteRepository::class);
        $this->app->bind(NoteApiInterface::class, NoteApiRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
