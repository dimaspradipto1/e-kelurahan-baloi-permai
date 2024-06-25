<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class LkRequest extends FormRequest
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
            'nama_lembaga' => 'required|string',
            'alamat' => 'required|',
            'rt' => 'required|in:001,002,003,004,005,006,007,008,009',
            'rw' => 'required|in:001,002,003,004,005,006,007,008,009,010,011,012,013,014',
            'no_hp' =>'nullable|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */

    public function messages(): array
    {
        return [
            'nama_lembaga.required' => 'Nama Lembaga tidak boleh kosong',
            'alamat.required' => 'Alamat Lembaga tidak boleh kosong',
            'rt.required' => 'RT Lembaga tidak boleh kosong',
            'rt.in' => 'RT Lembaga tidak valid',  
            'rw.required' => 'RW Lembaga harus tidak boleh kosong',
            'rw.in' => 'RW Lembaga tidak valid',
        ];
    }
    
}
