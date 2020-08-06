<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Corcel\Model\Page;
use Corcel\Model\Taxonomy;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(Request $request)
    {
        $categories = app(CategoriesController::class)->index();

        $posts = \App::call(PostsController::class . '@index');

        $categoriesPosts = [];
        /* @var $category Taxonomy */
        foreach ($categories as $category) {
            $slug = $category->slug;
            $request->request->set('category', $slug);
            $categoriesPosts[$slug] = \App::call(PostsController::class . '@index');
        }

        return [
            'categories' => $categories,
            'posts' => $posts,
            'categoriesPosts' => $categoriesPosts
        ];
    }

    public function about()
    {
        $about = Page::slug('o-nas')->first();

        return [
            'title' => $about->post_title,
            'content' => $about->post_content
        ];
    }

    public function politics()
    {
        $about = Page::slug('politics')->first();

        return [
            'title' => $about->post_title,
            'content' => $about->post_content
        ];
    }

    public function notFound()
    {
        return response()->json(['message' => 'Not Found.'], 404);
    }
}
