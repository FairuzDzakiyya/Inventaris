<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'kelas_id' => 'required|string|max:12',
            'jurusan_id' => 'required|string|max:12',
            'nama_siswa' => 'required|string|max:100',
            'nis' => 'required|string|max:20|unique:siswas,nis',
            'jk' => 'required|in:L,P',
            'email' => 'nullable|email|max:100',
        ];
    }
}
