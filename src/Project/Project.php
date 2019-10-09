<?php
    namespace App\Project;

    use App\Shared\Interfaces\ResponseInterface;
    use App\Shared\Interfaces\StorageInterface;

final class Project
{
    private $response;
    private $storage;

    public function __construct(ResponseInterface $response, StorageInterface $storage)
    {
        $this->response = $response;
        $this->storage = $storage;
    }

    public function check()
    {
        $author = 'Marvin Isaac';
        $history = $this->storage->getBy($author);
        return $this->response->sendJson($history);
    }
}
