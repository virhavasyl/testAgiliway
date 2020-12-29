<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreArticleRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max: 255'],
            'text' => ['required', 'string'],
            'user_id' => ['exists:users,id'],
        ];
    }

    public function validationData()
    {
        return array_merge($this->all(), [
            'user_id' => Auth::id(),
        ]);
    }
}
