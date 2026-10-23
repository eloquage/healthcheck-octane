<?php

declare(strict_types=1);

use IllumaLaw\HealthCheckOctane\HealthcheckOctaneServiceProvider;
use Illuminate\Support\ServiceProvider;

it('registers the config publish path under the correct tag', function () {
    $provider = app()->getProvider(HealthcheckOctaneServiceProvider::class);
    if (! ($provider instanceof HealthcheckOctaneServiceProvider)) {
        throw new RuntimeException('The package service provider must be registered.');
    }

    $source = dirname(__DIR__).'/src/../config/healthcheck-octane.php';

    expect(ServiceProvider::pathsToPublish($provider::class, 'healthcheck-octane-config'))
        ->toBe([$source => config_path('healthcheck-octane.php')]);
});

it('loads config with the correct default', function () {
    expect(config('healthcheck-octane.required'))->toBeFalse();
});
