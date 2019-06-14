<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectionRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'movie_id' => ['required', 'integer', 'min:1'],
            'cinema_hall_id' => ['required', 'integer', 'min:1'],
            'start_at' => ['required'],
            'ticket_price' => ['required'],
        ];
    }
}
