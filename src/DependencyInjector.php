<?php
    // @codeCoverageIgnoreStart
    namespace App;

    use App\DefaultForbidden\DefaultForbidden;
    use App\Project\Http\Request as Project;

/**
 * Add all dependencies required by the app
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class DependencyInjector
{

    /**
     * Inject listed dependencies to the app container which will then make it available throughout
     * the whole app. These could be route handlers, database managers, etc.
     * @param \Slim\App $app
     * @return \Slim\App
     */
    public function inject(\Slim\App $app) : \Slim\App
    {
        $container = $app->getContainer();

        $capsule = new \Illuminate\Database\Capsule\Manager;
        $capsule->addConnection($container->get('settings')['sqlite'], 'sqlite');
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $container['database'] = function ($container) use ($capsule) {
            return $capsule;
        };

        $container['DefaultForbidden'] = function ($container) {
            return new DefaultForbidden($container);
        };

        $container['Project'] = function ($container) {
            return new Project($container);
        };
        
        return $app;
    }
}
