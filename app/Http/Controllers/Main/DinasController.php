<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\DinasRequest;
use App\Models\Dinas;
use Illuminate\Http\Request;

class DinasController extends Controller
{
    public function index()
    {
        return view('main.dinas.index');
    }

    public function render()
    {
        $dinas = Dinas::all();

        $view = [
            'data' => view('main.dinas.render', compact('dinas'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $kategori = [
            'Internal Pemerintahan Badung',
            'Luar Pemerintahan Badung'
        ];
        $view = [
            'data' => view('main.dinas.create', compact('kategori'))->render(),
        ];

        return response()->json($view);
    }

    public function store(DinasRequest $request)
    {
        try {
            $data = [
                'nama' => $request->nama,
                'kategori' => $request->kategori,
            ];

            Dinas::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan',
                // 'message' => 'Terjadi kesalahan',
                'title' => 'Gagal'
            ]);
        }
    }

    public function edit($id) 
    {
        $dinas = Dinas::find($id);
        $kategori = [
            'Internal Pemerintahan Badung',
            'Luar Pemerintahan Badung'
        ];
        $view = [
            'data' => view('main.dinas.edit', compact('dinas', 'kategori'))->render()
        ];

        return response()->json($view);
    }

    public function update(DinasRequest $request)
    {
        try {
            $dinas = Dinas::find($request->id);
            $data = [
                'nama' => $request->nama,
                'kategori' => $request->kategori,
            ];

            $dinas->update($data);

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
