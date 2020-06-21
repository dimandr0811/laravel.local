<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PracticeImageUploadRequest extends FormRequest
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
            'image'         => 'image',
        ];
    }

    public function messages()
    {
        return[
            'image.image'   => 'Файл должен быть в формате изображения',
        ];
    }

}
