<?php
    // @codeCoverageIgnoreStart
    namespace App;
    
/**
 * Setup environment variables
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class Environment
{
    /**
     * Access .env file, load it, check for required variables and finally set up the environment
     * variables. These variables could be configuration options, secret keys, etc that MUST NOT be
     * added to the repository but are required by the app to run.
     * @return void
     */
    public static function setup()
    {
        try {
            $env = \Dotenv\Dotenv::create(__DIR__ . '/../private/');
            $env->load();
            $env->required([
                'ENVIRONMENT',
            ]);
        } catch (\Exception $e) {
            error_log($e);
            header("HTTP/1.1 500 Server Error");
            exit();
        }
    }
}
