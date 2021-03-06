<?php namespace Balzreber\Delivery;

use Illuminate\Support\ServiceProvider;

class DeliveryServiceProvider extends ServiceProvider {

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
		include __DIR__.'/../../routes.php';
		$loader = \Illuminate\Foundation\AliasLoader::getInstance();
      	$loader-> alias('Delivery', 'Balzreber\Delivery\Facades\Delivery');
		$this->loadViewsFrom(__DIR__.'/../../views', 'delivery');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['delivery'] = $this->app-> share(function($app) {
			return new Delivery;
		});

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('delivery');
	}

}
