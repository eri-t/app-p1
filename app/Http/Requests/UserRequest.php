<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required | min:5 | max:64',
            'job_title' => 'required | min:5 | max:64',
            'address' => 'required | min:5 | max:64',
            'phone_number' => 'required | numeric | min:5 | max:12',
            //    'file' => 'image | dimensions:min_width=100,min_height=200 | size:512',
            'file' => 'mimes:jpeg | dimensions:min_width=100,min_height=200 | size:512',
        ];
    }
}
