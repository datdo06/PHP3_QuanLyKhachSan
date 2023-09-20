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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];

        $currentAction = $this ->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction) :
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'password' => 'required',
                            'image'=> 'required|image|mimes:jpeg,jpg,png|max:5120',
                            'email'=>'required|email|unique:users'
                        ];
                        break;
                    case 'validate_login':
                        $rules = [
                            'password' => 'required',
                            'email'=>'required|email|unique:users'
                        ];
                        break;
                endswitch;
                break;
        endswitch;


        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên ko đc để trống',
            'password.required'=>'Password ko đc để trống',
            'image.required'=> 'Vui lòng nhập hình ảnh',
            'email.required'=>'Email ko đc để trống..Phải nhập!!!',
            'email.email'=>'Phải là kiểu email',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự'
        ];
    }
}
