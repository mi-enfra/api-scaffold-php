<?php
    // @codeCoverageIgnoreStart
    namespace App\DefaultForbidden;

    use App\Shared\Base\HttpRequest as BaseClass;

/**
 * Class to handle routes/requests that are not allowed or not yet implemented
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class DefaultForbidden extends BaseClass
{
    /**
     * Overrides abstract method from base class. Returns a blank response with 403 HTTP status
     * @param \Slim\Http\Request $request
     * @param \Slim\Http\Response $response
     * @param array $args
     * @return \Slim\Http\Response
     */
    public function __invoke(
        \Slim\Http\Request $request,
        \Slim\Http\Response $response,
        array $args
    ) : \Slim\Http\Response {
        return $response->withStatus(403);
    }
}
