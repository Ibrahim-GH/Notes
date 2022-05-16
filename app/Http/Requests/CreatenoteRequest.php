<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatenoteRequest extends FormRequest
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
            'content' => 'required|string|max:500',
            'userId' => 'required|exists:Users,id',
            'image'  => 'required|max"1000|jpg,Png,Gif',
            'type' => ['required', new EnumValue(NoteType::class)],
        ];
    }
}
