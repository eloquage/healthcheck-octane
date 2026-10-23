<?php

declare(strict_types=1);

return [
    /*
     * Whether a stopped Octane server should fail the health check.
     * When false, a stopped server produces a warning.
     */
    'required' => env('HEALTH_OCTANE_REQUIRED', false),

    /*
     * Whether to skip a stopped-server result outside production-like environments.
     */
    'skip_outside_production_like' => env('HEALTH_OCTANE_SKIP_OUTSIDE_PRODUCTION', false),
];
