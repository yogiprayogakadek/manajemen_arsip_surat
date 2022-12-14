<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Dinas;
use App\Models\KlasifikasiSurat;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        return view('main.surat-masuk.index');
    }

    public function render()
    {
        $surat = SuratMasuk::all();

        $view = [
            'data' => view('main.surat-masuk.render', compact('surat'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        $kategori = [
            'Penting', 'Umum'
        ];
        $dinas = Dinas::pluck('nama', 'id')->toArray();
        $view = [
            'data' => view('main.surat-masuk.create', compact('klasifikasi', 'kategori', 'dinas'))->render(),
        ];

        return response()->json($view);
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'pengirim' => $request->pengirim,
                'klasifikasi' => $request->klasifikasi,
                'kategori' => $request->kategori,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'dinas_id' => $request->tembusan,
                'tembusan_khusus' => json_encode($request->tembusan_khusus),
                'tanggal_surat' => $request->tanggal_surat,
                'unit_kerja_id' => $request->unit_kerja_id
            ];

            if($request->hasFile('file_surat')) {
                $filenamewithextension = $request->file('file_surat')->getClientOriginalName();

                //get file extension
                $extension = $request->file('file_surat')->getClientOriginalExtension();

                //filename to store
                $filenametostore = 'file_surat-' . $request->pengirim . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/surat-masuk/surat';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                
                $request->file('file_surat')->move($save_path, $filenametostore);

                $data['file_surat'] = $save_path . '/' . $filenametostore;
            }

            if($request->hasFile('file_lampiran')) {
                $filenamewithextension = $request->file('file_lampiran')->getClientOriginalName();

                //get file extension
                $extension = $request->file('file_lampiran')->getClientOriginalExtension();

                //filename to store
                $filenametostore = 'file_lampiran-' . $request->pengirim . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/surat-masuk/lampiran';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                
                $request->file('file_lampiran')->move($save_path, $filenametostore);

                $data['file_lampiran'] = $save_path . '/' . $filenametostore;
            }

            SuratMasuk::create($data);

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
