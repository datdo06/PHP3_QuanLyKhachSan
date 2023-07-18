<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhachHangRequest extends FormRequest
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

        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()) :
            case 'POST' :
                switch ($currentAction) :
                    case 'add':
                        $rules = [
                            'name' => 'required',
                            'sdt' => 'required'
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
            'sdt.required'=>'SDT ko đc để trống',
            'sdt.unique'=>'SDT đã tồn tại'
        ];
    }
}
