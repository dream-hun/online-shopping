<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Gate;
use Illuminate\Foundation\Http\FormRequest;

final class UpdateEventRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('event_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'date' => [
                'required',
                'date_format:'.config('panel.date_format'),
            ],
        ];
    }
}
