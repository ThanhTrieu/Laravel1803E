<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductPost extends FormRequest
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
            'name' => 'required|min:3|max:60',
            'cat_id' => 'required|numeric',
            'size_id' => 'required|numeric',
            'price' =>'numeric',
            'qty' => 'numeric',
            'image' =>'required|mimes:jpeg,bmp,png,gif,jpg',
            'description' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ':attribute khong duoc de trong',
            'name.min' => ':attribute khong duoc nho hon :min ki tu',
            'name.max' => ':attribute khong duoc lon hon :max ki tu',
            'cat_id.numeric' => 'vui long chon caetegories',
            'size_id.numeric' => 'vui long chon size',
            'price.numeric' => 'Vui long nhap gia tien',
            'qty.numeric' => 'Vui long nhap so luong san pham',
            'image.mimes' => 'Dinh dang file khong dung',
            'description.required' => ':attribute khong duoc trong',
            'description.min' => ':attribute khong duoc nho hon :min ki tu'
        ];
    }
}
