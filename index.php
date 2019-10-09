<?php
// @codeCoverageIgnoreStart
    require __DIR__ . '/vendor/autoload.php';
    
    use App\Environment;
    use App\Setting;
    use App\DependencyInjector;
    use App\MiddlewareInjector;
    use App\Router;
    
    Environment::setup();

    $setting = Setting::get();
    $app = new \Slim\App($setting);
    
    $dependency = new DependencyInjector();
    $app = $dependency->inject($app);

    $middleware = new MiddlewareInjector();
    $app = $middleware->inject($app);

    $router = new Router();
    $app = $router->set($app);
    
    $app->run();
