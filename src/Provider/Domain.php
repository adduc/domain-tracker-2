<?php

namespace Adduc\DomainTracker\Provider;

use Novutec\WhoisParser\Parser;
use Silex\Application;
use Silex\ServiceProviderInterface;

class Domain implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['domain'] = $app->protect(function($domain) use ($app) {
            $memoize = $app['memoize'];

            $lookup = function() use ($domain) {
                $parser = new Parser();
                return $parser->lookup($domain);
            };

            return $memoize->memoizeCallable('domain-lookup', $lookup, 3600);
        });
    }

    public function boot(Application $app)
    {
    }
}
