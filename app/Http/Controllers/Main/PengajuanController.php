<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengajuanRequest;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        return view('main.pengajuan.index');
    }

    public function render()
    {
        $pengajuan = Pengajuan::all();

        $view = [
            'data' => view('main.pengajuan.render', compact('pengajuan'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.pengajuan.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(PengajuanRequest $request)
    {
        try {
            $data = [
                'user_id' => Auth::user()->id,
                'kode' => $request->kode,
                'unit_pengolahan' => $request->unit_pengolahan,
                'tanggal_surat' => $request->tanggal_surat,
                'uraian_perihal' => $request->uraian_perihal,
                'keterangan' => $request->keterangan,
            ];

            Pengajuan::create($data);

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
        $pengajuan = Pengajuan::find($id);
        $view = [
            'data' => view('main.pengajuan.edit', compact('pengajuan'))->render()
        ];

        return response()->json($view);
    }

    public function update(PengajuanRequest $request)
    {
        try {
            $pengajuan = Pengajuan::find($request->id);
            $data = [
                'user_id' => Auth::user()->id,
                'kode' => $request->kode,
                'unit_pengolahan' => $request->unit_pengolahan,
                'tanggal_surat' => $request->tanggal_surat,
                'uraian_perihal' => $request->uraian_perihal,
                'keterangan' => $request->keterangan,
            ];

            $pengajuan->update($data);

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

    public function validasi($id)
    {
        try {
            $pengajuan = Pengajuan::find($id);

            // nomor surat
            $surat = Pengajuan::count();
            if($surat == 1) {
                $nomor_surat = $pengajuan->kode . '/0001'. '/' . $pengajuan->unit_pengolahan;
            } else {
                $last = Pengajuan::where('status', true)->latest()->first();

                $explode = explode('/', $last->nomor_surat);
                $lastNum = (int) substr($explode[1], -2, 2);

                $currentPage = (int) substr($explode[1], 0, 2);

                if($lastNum == 99) {
                    $currentPage += 1;
                    $nomor_surat = $pengajuan->kode . '/' . ($currentPage < 10 ? '0' . $currentPage : $currentPage) . '01' . '/' . $pengajuan->unit_pengolahan;
                } else {
                    $lastNum += 1;
                    $nomor_surat = $pengajuan->kode . '/' . ($currentPage < 10 ? '0' . $currentPage : $currentPage) . ($lastNum < 10 ? '0' . $lastNum : $lastNum) . '/' . $pengajuan->unit_pengolahan;
                }
            }

    
            if($pengajuan->status == true) {
                $data = [
                    'status' => false,
                    'nomor_surat' => null
                ];
            } else {
                $data = [
                    'status' => true,
                    'nomor_surat' => $nomor_surat
                ];
            }
            $pengajuan->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                // 'message' => 'Terjadi kesalahan',
                'title' => 'Gagal'
            ]);
        }
    }
}
