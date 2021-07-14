<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProduct extends FormRequest
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
            'sku' => 'required|unique:products,sku',
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required',
            'price' => 'required|numeric',
            'taxes' => ['required', 'numeric', Rule::in([0, 10, 19])],
            'active' => 'required',
        ];
    }
}
