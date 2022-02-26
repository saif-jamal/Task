<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
             'name'=>'required|string|min:3|max:25',
              'age'=>'required|string',
              'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
              'gender'=>'required',
              'result'=>'required|mimes:jpeg,png,jpg,pdf'
        ];
    }
}
