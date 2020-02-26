<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Category;
use Corcel\Model\Taxonomy;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Taxonomy::category()
            ->where('term_id', '!=', 1)
            ->get();

        $categories = $categories->sortBy(function ($category) {
            return $category->term->term_order;
        });

        return Category::collection($categories);
    }
}
