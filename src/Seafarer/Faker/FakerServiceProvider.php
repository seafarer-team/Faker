<?php namespace Seafarer\Faker;

use Illuminate\Support\ServiceProvider;
use Faker;
use Config;

class FakerServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('seafarer/faker');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app['faker'] = $this->app->share(function($app) {
            return Faker\Factory::create(Config::get('faker::faker.localization'));
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
