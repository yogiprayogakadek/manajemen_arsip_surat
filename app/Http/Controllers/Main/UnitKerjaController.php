<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\UnitKerjaRequest;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
{
    public function index()
    {
        return view('main.unit-kerja.index');
    }

    public function render()
    {
        $unit = UnitKerja::all();

        $view = [
            'data' => view('main.unit-kerja.render', compact('unit'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.unit-kerja.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(UnitKerjaRequest $request)
    {
        try {
            $data = [
                'nama' => $request->nama,
            ];

            UnitKerja::create($data);

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
        $unit = UnitKerja::find($id);
        $view = [
            'data' => view('main.unit-kerja.edit', compact('unit'))->render()
        ];

        return response()->json($view);
    }

    public function update(UnitKerjaRequest $request)
    {
        try {
            $unit = UnitKerja::find($request->id);
            $data = [
                'nama' => $request->nama
            ];

            $unit->update($data);

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
