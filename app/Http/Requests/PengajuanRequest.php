<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PengajuanRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'kode' => 'required',
            'unit_pengolahan' => 'required',
            'tanggal_surat' => 'required|date',
            'uraian_perihal' => 'required',
            'keterangan' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'date' => ':attribute hanya berupa tanggal',
        ];
    }

    public function attributes()
    {
        return [
            'kode' => 'Kode',
            'unit_pengolahan' => 'Unit pengolahan',
            'tanggal_surat' => 'Tanggal surat',
            'uraian_perihal' => 'Uraian perihal',
            'keterangan' => 'Keterangan atau penanggung jawab',
        ];
    }
}