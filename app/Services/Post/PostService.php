<?php

namespace App\Services\Post;
use \Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Models\Post;
class PostService
{
    public function getAll(): LengthAwarePaginator
    {
        $perPage = config('app.per_page', 15); // fallback to 15
        $query = Post::latest();
        return $query->paginate($perPage);
    }

    public function find(int $id): Post
    {
        return Post::findOrFail($id);
    }

    public function update(int $id, array $data): bool
    {
        return Post::where('id', $id)->update($data);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }
}