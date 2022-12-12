<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipeRequest;
use App\Models\TipeSurat;
use Illuminate\Http\Request;

class TipeSuratController extends Controller
{
    public function index()
    {
        return view('main.tipe.index');
    }

    public function render()
    {
        $tipe = TipeSurat::all();

        $view = [
            'data' => view('main.tipe.render', compact('tipe'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.tipe.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(TipeRequest $request)
    {
        try {
            $data = [
                'tipe' => $request->tipe,
                'nomor' => $request->nomor,
            ];

            TipeSurat::create($data);

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
        $tipe = TipeSurat::find($id);
        $view = [
            'data' => view('main.tipe.edit', compact('tipe'))->render()
        ];

        return response()->json($view);
    }

    public function update(TipeRequest $request)
    {
        try {
            $tipe = TipeSurat::find($request->id);
            $data = [
                'tipe' => $request->tipe,
                'nomor' => $request->nomor,
            ];

            $tipe->update($data);

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
