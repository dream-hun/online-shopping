<?php

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('setting_edit');
    }

    public function rules()
    {
        return [
            'mobile_one' => [
                'string',
                'required',
                'unique:settings,mobile_one,'.request()->route('setting')->id,
            ],
            'mobile_two' => [
                'string',
                'required',
                'unique:settings,mobile_two,'.request()->route('setting')->id,
            ],
            'whatsapp' => [
                'string',
                'required',
                'unique:settings,whatsapp,'.request()->route('setting')->id,
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
