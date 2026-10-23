# illuma-law/healthcheck-octane

Checks whether the configured Laravel Octane server is running by calling `octane:status`.

## Usage

```php
use IllumaLaw\HealthCheckOctane\OctaneServerCheck;
use Spatie\Health\Facades\Health;

Health::checks([
    OctaneServerCheck::new(),
]);
```

## Configuration

Publish config: `php artisan vendor:publish --tag="healthcheck-octane-config"`

Options in `config/healthcheck-octane.php`:
- `required`: fail the health check when Octane is stopped; otherwise report a warning.
- `skip_outside_production_like`: skip a stopped-server result outside production-like environments.
