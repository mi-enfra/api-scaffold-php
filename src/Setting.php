<?php
    // @codeCoverageIgnoreStart
    namespace App;
    
/**
 * Returns array of options to be used by Slim
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class Setting
{
    /**
     * Return settings to be used by the app
     * @return  array
     */
    public static function get() : Array
    {
        $shouldDisplayError = false;
        if ($_ENV['ENVIRONMENT'] === 'LOCAL' || $_ENV['ENVIRONMENT'] === 'STAGING') {
            $shouldDisplayError = true;
        }
        return [
            'settings' => [
                'addContentLengthHeader' => false,
                'sqlite' => [
                    'driver' => 'sqlite',
                    'database' => __DIR__ . '/../database/database.sqlite',
                ],
                'determineRouteBeforeAppMiddleware' => true,
                'displayErrorDetails' => $shouldDisplayError,
            ],
        ];
    }
}
