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
    public function rules()
    {
        $id = $this->segment(3);
        $rules = [
            'name' => ['required', 'string','min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,{$id},id'],
            'password' => ['required', 'string', 'min:6'],
        ];

        if($this->method() == 'PUT'){
            $rules['password'] = ['nullable', 'string', 'min:6'];
        }

        return $rules;

    }

    

    public function messages()
    {
        return [
            'name.required' => 'Preencha o campo nome',
            'email.required' => 'Preencha o campo email',
            'password' => 'A senha é obrigatória',
        ];
    }
}
