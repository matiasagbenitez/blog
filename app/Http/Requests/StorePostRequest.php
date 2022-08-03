<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $post = $this->route()->parameter('post');

        $rules = [
            'name' => 'required|unique:posts',
            'slug' => 'required',
            'status' => 'required|in:1,2'
        ];

        if ($post) {
            $rules['name'] = 'required|unique:posts,name,' . $post->id;
        }

        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required',
            ]);
        }

        return $rules;
    }
}
