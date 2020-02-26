<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Corcel\Model\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
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
        return [
            'title' => 'Политика конфиденциальности',
            'content' => 'Ошибка загрузки..'
        ];
    }

    public function notFound()
    {
        return response()->json(['message' => 'Not Found.'], 404);
    }
}
