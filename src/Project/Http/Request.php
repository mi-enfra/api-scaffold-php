<?php
    namespace App\Project\Http;

    use App\Project\Project;
    use App\Project\Http\Response;
    use App\Project\Http\Storage;
    use App\Shared\Base\HttpRequest;

/**
 * Input class for Project class
 * @author Marvin Isaac <misaac@pushnami.com>
 */
final class Request extends HttpRequest
{
    public function __invoke(
        \Slim\Http\Request $request,
        \Slim\Http\Response $response,
        array $args
    ) : \Slim\Http\Response {
        $response = new Response($response);
        $storage = new Storage();
        $project = new Project($response, $storage);
        return $project->check();
    }
}
