<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'id' => 'required|unique:items,id',
            'name' => 'required',
            'hs_code' => 'required',
            'category' => 'required',
            'kondisi' => 'required',
            'jenis_satuan' => 'required',
            'stok' => 'required',
        ];
    }
}
