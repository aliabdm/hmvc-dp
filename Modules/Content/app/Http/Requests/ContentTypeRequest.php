<?php

namespace Modules\Content\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentTypeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => "required"
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
        // return auth()->user()->can('users.create');
    }
}
