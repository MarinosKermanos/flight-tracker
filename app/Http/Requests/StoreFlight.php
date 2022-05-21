<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFlight extends FormRequest
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
            'airplane_id' => [
                'required',
            ],
            'From' => [
                'required',
            ],
            'To' => [
                'required',
            ],
            'departure' => [
                'required',
            ],
            'arrival' => [
                'required',
            ],
            'expected_duration' => [
                'required',
            ],
            'actual_duration' => [
                'required',
            ],
        ];
    }
}
