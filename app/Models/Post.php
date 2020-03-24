<?php

namespace App\Models;

use App\Traits\SearchTrait;
use Illuminate\Database\Eloquent\Model;

use Corcel\Model\Post as Corcel;

class Post extends Corcel
{
    use SearchTrait;
    protected $postType = 'post';
}
