<?php

namespace Adduc\DomainTracker\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class Memoize implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['memoize'] = $app['settings']['memoize'];
    }

    public function boot(Application $app)
    {
    }
}