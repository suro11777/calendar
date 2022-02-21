<?php

namespace App\Http\Requests;

use App\Rules\AppointmentDateRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppointmentRequest extends FormRequest
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
            'with_whom' => 'required|exists:users,id',
            'start_time' => ['required'],
            'finish_time' => ['required', new AppointmentDateRule],
        ];
    }
}
