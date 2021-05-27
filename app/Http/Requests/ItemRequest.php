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
            'name' => 'required',
            'hs_code' => 'required|max=255',
            'category' => 'required|max=255',
            'kondisi' => 'required',
            'jenis_satuan' => 'required|max=255',
            'stok' => 'required',

        ];
    }
}
