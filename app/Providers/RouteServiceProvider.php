<?php

namespace App\Providers;

use App\Enums\RateLimitEnum;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider {


	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map() {
		$this->mapApiRoutes();

		$this->mapWebRoutes();
	}

	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes() {
		Route::middleware(['web', 'throttle:' . RateLimitEnum::WEB])->group(base_path('routes/web.php'));
	}

	/**
	 * Define the "api" routes for the application.
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes() {
		$this->configureRateLimiting();

		Route::prefix('api')->middleware(['api', 'throttle:' . RateLimitEnum::API])->group(base_path('routes/api.php'));

	}

	protected function configureRateLimiting() {
		RateLimiter::for(RateLimitEnum::API, function (Request $request) {
			return Limit::perMinute(60)->by($request->user() ? $request->user()->id : $request->ip());
		});

		RateLimiter::for(RateLimitEnum::WEB, function (Request $request) {
			return Limit::perMinute(60)->by(Auth::id() ?? $request->ip());
		});
	}
}
