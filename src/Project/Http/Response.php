<?php
    namespace App\Project\Http;

    use App\Shared\Base\HttpResponse;

final class Response extends HttpResponse
{
    public function sendJson(array $json)
    {
        return $this->response->withJson($json);
    }
}
