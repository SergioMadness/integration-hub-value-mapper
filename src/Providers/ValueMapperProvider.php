<?php namespace professionalweb\IntegrationHub\ValueMapper\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\ValueMapper\Services\ValueMapperService;
use professionalweb\IntegrationHub\ValueMapper\Repositories\ValueMapRepository;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService as IValueMapperService;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository as IValueMapRepository;

class ValueMapperProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register(): void
    {
        $this->app->singleton(IValueMapRepository::class,ValueMapRepository::class);
        $this->app->singleton(IValueMapperService::class, ValueMapperService::class);
    }
}