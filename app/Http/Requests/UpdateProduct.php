<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'sku' => 'nullable',
            'name' => 'nullable',
            'description' => 'nullable',
            'photo' => 'nullable',
            'price' => 'nullable|numeric',
            'taxes' => ['required', 'numeric', Rule::in([0, 10, 19])],
            'active' => 'nullable',
        ];
    }
}
