<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'foto' => 'image|max:1024',
            'hasil_mcu' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            'siml' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            'hasil_bst' => 'file|mimes:jpeg,png,jpg,pdf|max:2048',
            'password' => 'min:8'
        ];
    }

    public function messages(): array
    {
     return [
        'foto.image' => 'file bukan bertipe gambar',
        'foto.max' => 'ukuran file tidak boleh lebih dari 1MB',
        'password.min' => 'password minimal terdiri dari 8 karakter',
     ];   
    }
}
