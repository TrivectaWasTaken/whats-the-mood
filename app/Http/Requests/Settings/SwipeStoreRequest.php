<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SwipeStoreRequest extends FormRequest
{
    public function authorize(): bool { return auth()->check(); }

    public function rules(): array
    {
        return [
            'work_id' => ['required','integer','exists:works,id'],
            'direction' => ['required','in:like,dislike'],
        ];
    }
}
