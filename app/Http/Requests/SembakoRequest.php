<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SembakoRequest extends FormRequest
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
            'nama' => 'nullable|string|max:255',
            'nik' => 'nullable|numeric',
            'no_hp' => 'nullable|numeric',
            'kk' => 'nullable|numeric',
            'alamat' => 'nullable|string|max:255',
            'rt' => 'required|in:001,002,003,004,005,006,007,008,009',
            'rw' => 'required|in:001,002,003,004,005,006,007,008,009,010,011,012,013,014',
            'no_hp'=>'nullable|numeric',
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama Sembako tidak boleh kosong',
            'nama.string' => 'Nama Sembako harus berupa string',
            'nama.max' => 'Nama Sembako maksimal 255 karakter',
            'nik.required' => 'NIK Sembako tidak boleh kosong',
            'nik.numeric' => 'NIK Sembako harus berupa angka',
            'no_hp.required' => 'No HP Sembako tidak boleh kosong',
            'no_hp.numeric' => 'No HP Sembako harus berupa angka',
            'kk.required' => 'KK Sembako tidak boleh kosong',
            'kk.numeric' => 'KK Sembako harus berupa angka',
            'alamat.required' => 'Alamat Sembako tidak boleh kosong',
            'alamat.string' => 'Alamat Sembako harus berupa string',
            'alamat.max' => 'Alamat Sembako maksimal 255 karakter',
            'rt.required' => 'RT Sembako tidak boleh kosong',
            'rt.in' => 'RT Sembako tidak valid',  
            'rw.required' => 'RW Sembako harus tidak boleh kosong',
            'rw.in' => 'RW Sembako tidak valid',
            'no_hp.required' => 'No HP Sembako tidak boleh kosong',
            'no_hp.numeric' => 'No HP Sembako harus berupa angka',
        ];
    }
}
