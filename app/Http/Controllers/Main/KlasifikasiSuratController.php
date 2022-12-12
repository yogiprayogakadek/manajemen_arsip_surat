<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\KlasifikasiRequest;
use App\Models\KlasifikasiSurat;
use Illuminate\Http\Request;

class KlasifikasiSuratController extends Controller
{
    public function index()
    {
        return view('main.klasifikasi.index');
    }

    public function render()
    {
        $klasifikasi = KlasifikasiSurat::all();

        $view = [
            'data' => view('main.klasifikasi.render', compact('klasifikasi'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.klasifikasi.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(KlasifikasiRequest $request)
    {
        try {
            $data = [
                'klasifikasi' => $request->klasifikasi,
                'nomor' => $request->nomor,
            ];

            KlasifikasiSurat::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Terjadi kesalahan',
                'message' => 'Terjadi kesalahan',
                'title' => 'Gagal'
            ]);
        }
    }

    public function edit($id) 
    {
        $klasifikasi = KlasifikasiSurat::find($id);
        $view = [
            'data' => view('main.klasifikasi.edit', compact('klasifikasi'))->render()
        ];

        return response()->json($view);
    }

    public function update(KlasifikasiRequest $request)
    {
        try {
            $klasifikasi = KlasifikasiSurat::find($request->id);
            $data = [
                'klasifikasi' => $request->klasifikasi,
                'nomor' => $request->nomor,
            ];

            $klasifikasi->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Terjadi kesalahan',
                'message' => 'Terjadi kesalahan',
                'title' => 'Gagal'
            ]);
        }
    }
}
