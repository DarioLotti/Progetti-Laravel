<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;


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
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::all());
        }
        Paginator::useBootstrap();

        $categoryIcons = [
            ['name' => 'Motori' , 'imgPath' => 'transport.png'],
            ['name' => 'Elettrodomestici' , 'imgPath' => 'blending.png'],
            ['name' => 'Informatica' , 'imgPath' => 'technology.png' ],
            ['name' => 'Libri' , 'imgPath' => 'open-book.png'  ],
            ['name' => 'Giochi' , 'imgPath' => 'controller.png'],
            ['name' => 'Sport' , 'imgPath' => 'sports.png'],
            ['name' => 'Immobili' , 'imgPath' => 'house.png' ],
            ['name' => 'Telefoni' , 'imgPath' => 'smartphone.png' ],
            ['name' => 'Arredamento' , 'imgPath' => 'sofa.png' ],
        ];
        View::share(compact('categoryIcons')); 
    }
}
