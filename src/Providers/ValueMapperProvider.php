<?php namespace professionalweb\IntegrationHub\ValueMapper\Providers;

use Illuminate\Support\ServiceProvider;
use professionalweb\IntegrationHub\ValueMapper\Models\PairExistsOptions;
use professionalweb\IntegrationHub\ValueMapper\Models\SetValueMapOptions;
use professionalweb\IntegrationHub\ValueMapper\Models\GetValueMapOptions;
use professionalweb\IntegrationHub\ValueMapper\Services\ValueMapperService;
use professionalweb\IntegrationHub\ValueMapper\Services\PairExistsSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Services\GetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Services\SetValueMapSubsystem;
use professionalweb\IntegrationHub\ValueMapper\Repositories\ValueMapRepository;
use professionalweb\IntegrationHub\IntegrationHubCommon\Interfaces\Services\SubsystemPool;
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
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'IntegrationHubValueMapper');

        $this->app->booted(static function () {
            /** @var SubsystemPool $pool */
            $pool = app(SubsystemPool::class);
            $pool->register(trans('IntegrationHubValueMapper::common.set-value'), SetValueMapSubsystem::SUBSYSTEM_ID_SET, new SetValueMapOptions());
            $pool->register(trans('IntegrationHubValueMapper::common.get-value'), GetValueMapSubsystem::SUBSYSTEM_ID, new GetValueMapOptions());
            $pool->register(trans('IntegrationHubValueMapper::common.pair-exists'), PairExistsSubsystem::SUBSYSTEM_ID_PAIR_EXISTS, new PairExistsOptions());
        });
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