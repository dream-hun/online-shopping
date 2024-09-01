<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'order_no' => [
                'string',
                'nullable',
            ],
            'client_name' => [
                'string',
                'required',
            ],
            'client_phone' => [
                'string',
                'required',
            ],
            'shipping_address' => [
                'string',
                'required',
            ],
        ];
    }
}
