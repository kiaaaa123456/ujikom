<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePelangganRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'kode_pelanggan' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_pelanggan' => 'Data kode pelanggan belum diisi!',
            'nama.required' => 'Data nama pelanggan belum diisi!',
            'alamat.required' => 'Data Alamat Pelanggan belum diisi!',
            'no_telp.required' => 'Data No Telp pelanggan belum diisi!',
            'email.required' => 'Data Email pelanggan belum diisi!',
        ];
    }
}
