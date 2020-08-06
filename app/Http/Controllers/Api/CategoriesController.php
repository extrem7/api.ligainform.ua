<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category;
use Corcel\Model\Taxonomy;

class CategoriesController extends Controller
{
    public function index()
    {
        return \Cache::remember('categories', now()->addHour(), function () {
            $categories = Taxonomy::category()
                ->whereNotIn('term_id', [1, 2413])
                ->get();

            $categories = $categories->sortBy(function ($category) {
                return $category->term->term_order;
            });

            return Category::collection($categories);
        });
    }
}
