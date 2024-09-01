<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_create');
    }

    public function rules()
    {
        return [
            'mobile_one' => [
                'string',
                'required',
                'unique:settings',
            ],
            'mobile_two' => [
                'string',
                'required',
                'unique:settings',
            ],
            'whatsapp' => [
                'string',
                'required',
                'unique:settings',
            ],
            'email_one' => [
                'required',
            ],
            'email_two' => [
                'required',
            ],
            'shipping_fee' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'address' => [
                'string',
                'required',
            ],
            'about_us' => [
                'required',
            ],
        ];
    }
}
