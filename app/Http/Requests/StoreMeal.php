<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMeal extends FormRequest
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
            'chef_user_id' => [
                'required',
                'exists:users,id'
            ],
            'name' => [
                'required',
                'min:5'
            ],
            'is_vegetarian' => [
                'required'

            ],
            'flight_id' => [
                'required'

            ],
        ];
    }
}
