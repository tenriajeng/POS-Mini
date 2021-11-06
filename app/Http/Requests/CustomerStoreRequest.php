<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|string|unique:customers,email',
            'phone' => 'required|string|max:20',
            'address'  => 'required|max:200',
            'city'  => 'required|string|max:30',
            'province'  => 'required|string|max:30',
            'country'  => 'required|string|max:50',
            'postal_code'  => 'required|max:15',
        ];
    }
}
