<?php namespace professionalweb\IntegrationHub\ValueMapper\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\ValueMapper\Services\ValueMapperService;
use professionalweb\IntegrationHub\ValueMapper\Services\PairExistsSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Services\GetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Services\SetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Repositories\ValueMapRepository;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\ValueMapperService as IValueMapperService;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\PairExistsSubsystem as IPairExistsSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\GetValueMapSubsystem as IGetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\SetValueMapSubsystem as ISetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Interfaces\Repositories\ValueMapRepository as IValueMapRepository;

class ValueMapperProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);

        $this->app->singleton(IValueMapRepository::class, ValueMapRepository::class);
        $this->app->singleton(IValueMapperService::class, ValueMapperService::class);

        $this->app->singleton(IPairExistsSubsystem::class, PairExistsSubsystem::class);
        $this->app->singleton(ISetValueMapSubsystem::class, SetValueMapSubsystem::class);
        $this->app->singleton(IGetValueMapSubsystem::class, GetValueMapSubsystem::class);
    }
}