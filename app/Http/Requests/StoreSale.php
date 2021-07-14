<?php

namespace App\Http\Requests;

use App\Rules\ProductActiveRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreSale extends FormRequest
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
            'client' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'products' => 'required|array',
            'products.*.sku' => ['required', new ProductActiveRule],
            'products.*.count' => 'required',
        ];
    }
}
