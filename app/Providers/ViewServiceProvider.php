<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProductCategory;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('web.master', function ($view) {
            $categories = ProductCategory::with(['childCategories.children'])
                ->whereNull('parent_id')
                ->whereHas('childCategories') // Ensure the category has child categories
                ->get();

            $view->with('categories', $categories);
        });
    }
    
}
