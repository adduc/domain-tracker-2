<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Silex\Application;
use Adduc\DomainTracker;

$app = new Application();

$settings_file = __DIR__ . '/../settings.php';
$app->register(new DomainTracker\Provider\Settings($settings_file));
$app['debug'] = $app['settings']['debug'];

$app->register(new DomainTracker\Provider\Memoize());
$app->register(new DomainTracker\Provider\Domain());

$app->get('/domain/{domain}', function (Application $app, $domain) {
    $domain = $app['domain']($domain);
    return '<pre>' . var_export($domain, true);
});

$app->get('/apc/clear', function () {
    return apc_clear_cache();
});

$app->run();
