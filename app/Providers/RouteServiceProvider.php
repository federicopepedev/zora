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
    public const HOME = '/';

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
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPostsRoutes();

        $this->mapUsersRoutes();

        $this->mapCategoriesRoutes();

        $this->mapCommentsRoutes();

        $this->mapRolesRoutes();

        $this->mapPermissionsRoutes();


        //
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

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

    protected function mapPostsRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/posts.php'));
    }

    protected function mapUsersRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php'));
    }

    protected function mapCategoriesRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/categories.php'));
    }

    protected function mapCommentsRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/comments.php'));
    }

    protected function mapRolesRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/roles.php'));
    }

    protected function mapPermissionsRoutes()
    {
        Route::prefix('admin')
            ->middleware('web', 'auth', 'role:admin')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/permissions.php'));
    }
}
