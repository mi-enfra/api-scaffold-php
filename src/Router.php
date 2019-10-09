<?php
    // @codeCoverageIgnoreStart
    namespace App;

/**
 * Set routes for the app
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class Router
{
    /**
     * Configure routes for the app and add the handlers for each route. If needed, this is also
     * where named routes are set.
     * @param \Slim\App $app
     * @return \Slim\App
     */
    public function set(\Slim\App $app) : \Slim\App
    {
        $app->get('/project', 'Project');

        $app->any('/[{path:.*}]', 'DefaultForbidden');
        
        return $app;
    }
}
