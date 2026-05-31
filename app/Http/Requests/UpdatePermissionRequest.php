<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

final class UpdatePermissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('permission_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
        ];
    }
}
