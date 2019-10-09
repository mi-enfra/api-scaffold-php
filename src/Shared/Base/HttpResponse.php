<?php
    // @codeCoverageIgnoreStart
    namespace App\Shared\Base;
    
    use App\Shared\Interfaces\ResponseInterface;

/**
 * Base class for sending HTTP responses from the app
 * @author Marvin Isaac <misaac@pushnami.com>
 */
abstract class HttpResponse implements ResponseInterface
{
    /**
     * Instance of Slim\Http\Response
     * @var \Slim\Http\Response
     */
    protected $response;

    /**
     * Child class requires a copy of the Response so far. Middlewares might have modified the
     * Response and those modifications must be passed on
     * @param \Slim\Http\Response $response
     */
    public function __construct(\Slim\Http\Response $response)
    {
        $this->response = $response;
    }
}
