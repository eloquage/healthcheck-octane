# Healthcheck Octane

[![Tests](https://github.com/eloquage/healthcheck-octane/actions/workflows/run-tests.yml/badge.svg)](https://github.com/eloquage/healthcheck-octane/actions)
[![Latest Version](https://img.shields.io/packagist/v/illuma-law/healthcheck-octane)](https://packagist.org/packages/illuma-law/healthcheck-octane)
[![License](https://img.shields.io/packagist/l/illuma-law/healthcheck-octane)](LICENSE.md)

![Octane server healthcheck illustration](art/banner.png)

A Laravel Health check that runs `octane:status` and reports whether your configured Laravel Octane server is running.

## Requirements

- PHP 8.3 or later
- Laravel 12 or 13
- [Laravel Octane](https://laravel.com/docs/octane) and [Spatie Laravel Health](https://spatie.be/docs/laravel-health)

## Install

```bash
composer require illuma-law/healthcheck-octane
```

## Use

Register the check with your Laravel Health checks:

```php
use IllumaLaw\HealthCheckOctane\OctaneServerCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneServerCheck::new(),
]);
```

The check runs `octane:status` using the server set in `config/octane.php`. A running server is healthy. A stopped server is skipped in `local` and `testing`; elsewhere it warns by default.

## Configuration

Publish the package configuration if you want to change the defaults:

```bash
php artisan vendor:publish --tag=healthcheck-octane-config
```

In `config/healthcheck-octane.php`:

- Set `required` to `true` to fail the health check when Octane is stopped. The default `false` reports a warning.
- Set `skip_outside_production_like` to `true` to skip a stopped-server result outside production-like environments. The default is `false`.

You can also set `HEALTH_OCTANE_REQUIRED` and `HEALTH_OCTANE_SKIP_OUTSIDE_PRODUCTION` in your environment.

## Tests

```bash
composer install
composer test
composer analyse
```

## License

MIT. See [LICENSE.md](LICENSE.md).
