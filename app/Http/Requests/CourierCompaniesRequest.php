<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CourierCompaniesRequest  extends FormRequest
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
        $method = strtolower($this->method());
        switch ($method) {
            case 'post':
                $rules = [
                    'name'       => 'required',
                ];
                break;
            case 'patch':
                $rules = [
                    'name'       => 'required',
                ];
                break;
        }

        return $rules;
    }
    public function messages()
    {
        return [
            'name.required'    => 'The Name field is required.',
        ];
    }
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status' => 422,
            'message' => $validator->errors()->first(),
            'all_message' =>  $validator->errors()
        ];
        $required_field = ['name' => 'name'];

        if ( request()->is('api*')){
           throw new HttpResponseException( response()->json($data,422) );
        }

        if ($this->ajax()) {
            throw new HttpResponseException(response()->json(['status' => false, 'validation_status' => 'jquery_validation', 'all_message' => $validator->errors(), 'event' => 'validation', 'required_field' => $required_field, 'message' => $validator->errors()->first()]));
        } else {
            throw new HttpResponseException(redirect()->back()->withInput()->with('errors', $validator->errors()));
        }
    }
}
