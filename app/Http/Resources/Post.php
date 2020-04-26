<?php

namespace App\Http\Resources;

use Corcel\Model\Option;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $siteUrl = Option::get('siteurl');
        $category = array_key_first($this->terms['category']);

        return [
            'id' => $this->ID,
            'title' => $this->title,
            'date' => $this->post_date->format('Y.m.d H:s'),
            'date_diff' => $this->post_date->diffForHumans(),
            'image' => $this->image,
            'url' => "$siteUrl/$category/$this->post_name"
        ];
    }
}
