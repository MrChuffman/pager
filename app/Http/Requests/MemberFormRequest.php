<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemberFormRequest extends Request
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
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            case 'POST':
            case 'PUT':
            default:
                return [
                    'department_id' => 'required|integer|unique:members,department_id',
                    'rank' => 'required',
                    'name' => 'required|unique:members,name',
                    'phone' => 'required|unique:members,phone',
                    'carrier' => 'required',
                    'password' => 'confirmed|required_if:admin,1'
                ];
        }
    }

    public function messages()
    {
        return [
            'department_id.unique' => "The department ID of {$this->department_id} has already been assigned.",
            'name.unique' => $this->name.' has already been registered.',
            'phone.unique' => 'The phone number has already been used.',
            'password.required_if' => 'The password field is required when a user can maintain members.'
        ];
    }
}
