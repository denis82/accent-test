<?php

namespace App\Providers;

use App\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use App\Layers\Presentation\View\Todo\CityView;
use App\Layers\UseCase\Todo\GetAllCitiesUseCase;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    private ?string $_prefixWeb;

    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */


    public function boot(): void
	{
		$this->configureRateLimiting();
        $this->app->singleton(App::class);
        app(App::class)->run();
        $this->_prefixWeb = app(App::class)->getPrefixWeb();

		$this->routes(function ()  {

            Route::prefix('api')
				->middleware('api')
				->namespace($this->namespace . '\\Api')
				->group(base_path('routes/api.php'));

            if($this->_prefixWeb){
                Route::prefix($this->_prefixWeb)->middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));
            } else {
                Route::middleware('web')
                    ->namespace($this->namespace)
                    ->group(base_path('routes/web.php'));
            }
		});
	}

    protected function configureRateLimiting()
	{
		RateLimiter::for('api', function (Request $request) {
			return Limit::perMinute(480)->by(optional($request->user())->id ?: $request->ip());
		});
	}
}
