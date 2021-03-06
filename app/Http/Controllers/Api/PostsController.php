<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostsRequest;
use App\Http\Requests\PostsSearchRequest;
use App\Http\Resources\Post as PostResource;
use App\Models\Post;

class PostsController extends Controller
{
    public function index(PostsRequest $request)
    {
        $params = $request->validated();

        $per_page = $params['per_page'] ?? 10;
        $category = $params['category'] ?? null;

        $query = Post::published()
            ->newest()
            ->select('ID', 'post_title', 'post_date', 'post_name', 'guid');

        if ($category) {
            $query = $query->taxonomy('category', $category);
        }

        $posts = $query->paginate($per_page);

        return PostResource::collection($posts);
    }

    public function search(PostsSearchRequest $request)
    {
        $params = $request->validated();

        $query = $params['query'];
        $per_page = $params['per_page'] ?? 10;

        $posts = Post::search($query)
            ->published()
            ->newest()
            ->paginate($per_page);

        return PostResource::collection($posts);
    }
}
