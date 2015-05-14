<?php

namespace Adduc\DomainTracker\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

class Settings implements ServiceProviderInterface
{
    protected $file;
    
    public function __construct($file)
    {
        $this->file = $file;
    }
    
    public function register(Application $app)
    {
        $app['settings'] = require $this->file;
    }

    public function boot(Application $app)
    {
    }
}