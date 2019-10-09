<?php
    // @codeCoverageIgnoreStart
    namespace App;

/**
 * Add all middlewares for the app
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class MiddlewareInjector
{
    /**
     * Inject listed middlewares to the app. These may include session checkers, CORS and custom
     * headers, etc
     * @param \Slim\App $app
     * @return \Slim\App
     */
    public function inject(\Slim\App $app) : \Slim\App
    {
        return $app;
    }
}
