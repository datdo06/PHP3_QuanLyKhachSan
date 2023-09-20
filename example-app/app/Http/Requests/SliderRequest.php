<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                            'image'=> 'required|image|mimes:jpeg,jpg,png|max:5120'
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
            'image.required'=> 'Vui lòng them hình ảnh'
        ];
    }
}
