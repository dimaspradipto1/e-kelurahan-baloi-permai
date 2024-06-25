<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GerejaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|string',
            'alamat' => 'required',
            'rt' => 'required|in:001,002,003,004,005,006,007,008,009',
            'rw' => 'required|in:001,002,003,004,005,006,007,008,009,010,011,012,013,014',
            'dokumen_legalitas' => 'nullable|string',
            'no_hp' =>'nullable|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Gereja tidak boleh kosong',
            'alamat.required' => 'Alamat Gereja tidak boleh kosong',
            'rt.required' => 'RT Gereja harus diisi',
            'rt.in' => 'RT Fasum tidak valid', 
            'rw.boolean' => 'RW Gereja harus dipilih',
            'rw.in' => 'RW Gereja tidak valid',
        ];
    }
}
