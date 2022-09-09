<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|unique:posts',
            'content' => 'required|string|unique:posts',
            'preview' => 'file|nullable',
            'image' => 'file|nullable',
            'category_id' => 'integer|required|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
        ];
    }
}
