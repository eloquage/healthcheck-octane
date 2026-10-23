<?php

declare(strict_types=1);

use IllumaLaw\HealthCheckOctane\HealthcheckOctaneServiceProvider;
use Illuminate\Support\ServiceProvider;

it('registers the config publish path under the correct tag', function () {
    $provider = app()->getProvider(HealthcheckOctaneServiceProvider::class);
    $source = dirname((new ReflectionClass($provider))->getFileName()).'/../config/healthcheck-octane.php';

    expect(ServiceProvider::pathsToPublish($provider::class, 'healthcheck-octane-config'))
        ->toBe([$source => config_path('healthcheck-octane.php')]);
});

it('loads config with the correct default', function () {
    expect(config('healthcheck-octane.required'))->toBeFalse();
});
