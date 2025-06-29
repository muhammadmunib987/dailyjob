<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\JobType;
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
      $jobCategories = Category::where('status', 1)
        ->withCount('jobs')  // Count related jobs
        ->orderBy('jobs_count', 'DESC') // Order by job count
        ->limit(3) // Get top 5 categories
        ->get();

        $jobTypes = JobType::where('status', 1)->get();
        
        View::share(compact('jobCategories', 'jobTypes'));
    }
}
