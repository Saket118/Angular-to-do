<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,

        // ✅ Custom CORS filter
        'cors'          => \App\Filters\CorsFilter::class,
    ];

    /**
     * Special required filters (system level).
     *
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Force HTTPS requests
            'pagecache',  // Page caching
        ],
        'after' => [
            'pagecache',   // Page caching
            'performance', // Performance metrics
            'toolbar',     // Debug Toolbar
        ],
    ];

    /**
     * Global filters applied before/after every request.
     *
     * @var array{
     *     before: array<string, array{except: list<string>|string}>|list<string>,
     *     after: array<string, array{except: list<string>|string}>|list<string>
     * }
     */
    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            'cors', // ✅ Apply CORS globally
        ],
        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * Filters for specific HTTP methods.
     *
     * Example: 'POST' => ['foo', 'bar']
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * Filters for specific URI patterns.
     *
     * Example: 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [];
}
