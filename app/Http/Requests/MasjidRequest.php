<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class MasjidRequest extends FormRequest
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
            'alamat' => 'required|string',
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
            'nama.required' => 'Nama Masjid tidak boleh kosong',
            'alamat.required' => 'Alamat Masjid tidak boleh kosong',
            'rt.required' => 'RT Masjid tidak boleh kosong',
            'rt.in' => 'RT Masjid tidak valid',  
            'rw.required' => 'RW Masjid harus tidak boleh kosong',
            'rw.in' => 'RW Masjid tidak valid',
        ];
    }
}
