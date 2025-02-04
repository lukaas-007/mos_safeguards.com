<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'email'],

            'shipping.address1' => ['required', 'string'],
            'shipping.address2' => [],
            'shipping.city' => ['required', 'string'],
            'shipping.state' => ['required', 'string'],
            'shipping.zipcode' => ['required', 'string'],
            'shipping.country_code' => ['required', 'string'],

            'billing.address1' => ['required', 'string'],
            'billing.address2' => [],
            'billing.city' => ['required', 'string'],
            'billing.state' => ['required', 'string'],
            'billing.zipcode' => ['required', 'string'],
            'billing.country_code' => ['required', 'string'],
        ];
    }

    public function attributes()
    {
        return [
            'billing.address1' => 'address 1',
            'billing.address2' => 'address 2',
            'billing.city' => 'city',
            'billing.state' => 'state',
            'billing.zipcode' => 'zip code',
            'billing.country_code' => 'country',
            'shipping.address1' => 'address 1',
            'shipping.address2' => 'address 2',
            'shipping.city' => 'city',
            'shipping.state' => 'state',
            'shipping.zipcode' => 'zip code',
            'shipping.country_code' => 'country',
        ];
    }
}
