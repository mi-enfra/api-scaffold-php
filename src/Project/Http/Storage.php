<?php
    namespace App\Project\Http;

    use App\Project\Http\Models\Detail as Model;
    use App\Shared\Interfaces\StorageInterface;

final class Storage implements StorageInterface
{
    public function getBy(string $author) : array
    {
        $latest = Model::where('author', $author)
            ->get()
            ->toArray();
        if (!isset($latest[0])) {
            return [];
        }
        return $latest;
    }
}
