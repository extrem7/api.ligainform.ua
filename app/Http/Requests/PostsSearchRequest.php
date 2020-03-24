<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsSearchRequest extends JsonFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'query' => 'required|string',
            'per_page' => 'nullable|int|min:1',
            'page' => 'nullable|int|min:1',
        ];
    }
}
