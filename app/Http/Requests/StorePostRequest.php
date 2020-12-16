<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => ['required','min:5','max:20'],
            'body' => ['required','min:5','max:2000']
        ];
    }

    public function  messages()
    {
       return [
            'title.required' => 'Phải nhập tiêu đề',
            'body.required' => 'Phải nhập nội dung',
            'title.min' => 'Tiêu đề tối thiểu 5 ký tự',
            'body.min' => 'Nội dung tối thiểu 5 ký tự',
            'title.max' => 'Tiêu đề tối đa 20 ký tự',
            'body.max' => 'Nội dung tối đa 2000 ký tự'
       ];
    }
}
