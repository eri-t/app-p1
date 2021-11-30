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
            'job_title' => 'min:3 | max:64 | nullable',
            'email' => 'required | email | unique:users,email,' . $this->user['id'],
            'slug' => 'required | max:64 | unique:users,slug,' . $this->user['id'],
            'address' => 'min:5 | max:64 | nullable',
            'phone_number' => 'regex:/[0-9]{8}/ | nullable',
            'file' => 'mimes:jpeg,png | dimensions:min_width=425,min_height=425 | max:512',
            'about_img' => 'image | max:512',
        ];
    }
}
