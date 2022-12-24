<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratMasukRequest extends FormRequest
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
            'pengirim' => 'required',
            'klasifikasi' => 'required',
            'kategori' => 'required',
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'tanggal_surat' => 'required',
            'tanggal_surat' => 'required',
            'unit_kerja' => 'required'
        ];

        // if(!Request::instance()->has('id')) {
        //     $rules += ['status' => 'nullable'];
        // } else {
        //     $rules += ['status' => 'required'];
        // }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
        ];
    }

    public function attributes()
    {
        return [
            'pengirim' => 'Pengirim',
            'klasifikasi' => 'Klasifikasi',
            'kategori' => 'Kategori',
            'nomor_surat' => 'Nomor surat',
            'perihal' => 'Perihal',
            'tanggal_surat' => 'Tanggal surat',
            'unit_kerja' => 'Unit kerja'
        ];
    }
}
