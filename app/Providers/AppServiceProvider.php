<?php

namespace App\Providers;

use App\Models\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $options = Options::all();

        View::share('options', $options);

        Paginator::useBootstrap();


        Builder::macro('whereLike', function ($attributes, string $searchTerm) {
            foreach (Arr::wrap($attributes) as $attribute) {
                $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
            }

            return $this;
        });
    }
}
