<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAdminsRoutes();
        $this->mapPagesRoutes();
        $this->mapNewsRoutes();
        $this->mapLanguageRoutes();
        $this->mapPostersRoutes();
        $this->mapImagesRoutes();
        $this->mapFilesRoutes();
        $this->mapTranslatableRoutes();
        $this->mapGalleryPostRoutes();
        $this->mapWebRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php'));
    }

    protected function mapAdminsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/admins.php'));
    }

    protected function mapPagesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/pages.php'));
    }
    protected function mapNewsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/news.php'));
    }

    protected function mapLanguageRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/language.php'));
    }
    protected function mapPostersRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/posters.php'));
    }
    protected function mapImagesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/images.php'));
    }
    protected function mapFilesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/files.php'));
    }
    protected function mapGalleryPostRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/gallery_posts.php'));
    }
    protected function mapTranslatableRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace)
            ->group(base_path('routes/admin/translatable.php'));
    }

}
