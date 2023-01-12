<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuratKeluarRequest;
use App\Models\Dinas;
use App\Models\KlasifikasiSurat;
use App\Models\Pengajuan;
use App\Models\SuratKeluar;
use App\Models\TipeSurat;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        return view('main.surat-keluar.index');
    }

    public function render()
    {
        $surat = SuratKeluar::with('klasifikasi', 'pengajuan')->get();

        $view = [
            'data' => view('main.surat-keluar.render', compact('surat'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        $tipe = TipeSurat::all();

        $nomor_surat = Pengajuan::where('user_id', auth()->user()->id)
                        ->where('status', true)
                        ->pluck('nomor_surat', 'id')->toArray();

        $kategori = [
            'Penting', 'Biasa', 'Rahasia', 'Undangan', 'Pengantar'
        ];
        $dinas = Dinas::pluck('nama', 'id')->toArray();
        $view = [
            'data' => view('main.surat-keluar.create', compact('klasifikasi', 'kategori', 'dinas', 'tipe', 'nomor_surat'))->render(),
        ];

        return response()->json($view);
    }

    public function store(SuratKeluarRequest $request)
    {
        try {
            // $surat = SuratKeluar::count();
            // if($surat == 0) {
            //     $nomor_surat = '833/0001'. '/test';
            // } else {
            //     $last = SuratKeluar::latest()->first();

            //     $explode = explode('/', $last->nomor_surat);
            //     $lastNum = (int) substr($explode[1], -2, 2);

            //     $currentPage = (int) substr($explode[1], 0, 2);

            //     if($lastNum == 99) {
            //         $currentPage += 1;
            //         $nomor_surat = '833/' . ($currentPage < 10 ? '0' . $currentPage : $currentPage) . '01/' . '/test';
            //     } else {
            //         $lastNum += 1;
            //         $nomor_surat = '833/' . ($currentPage < 10 ? '0' . $currentPage : $currentPage) . ($lastNum < 10 ? '0' . $lastNum : $lastNum) . '/test';
            //     }
            // }

            $data = [
                // 'nomor_surat' => $nomor_surat,
                'pengajuan_id' => $request->nomor_surat,
                'klasifikasi_id' => $request->klasifikasi,
                'tipe_id' => $request->tipe,
                'kategori' => $request->kategori,
                'perihal' => $request->perihal,
                'tanggal_surat' => $request->tanggal_surat,
                'catatan_pengingat' => $request->catatan ?? null,
            ];

            if($request->has('tujuan_surat')) {
                for($j = 0; $j < count($request->tujuan_surat); $j++) {
                    $tujuan_surat[] = $request->tujuan_surat[$j];
                }
                $data['tujuan_surat'] = json_encode($tujuan_surat);
            }

            $tujuan = [];
            if($request->has('tujuan')) {
                for($j = 0; $j < count($request->tujuan); $j++) {
                    $dinas = explode('|', $request->tujuan[$j]);
                    // dd($dinas);
                    $tujuan[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tujuan'] = json_encode($tujuan);
            }

            if($request->has('tujuan_keluar')) {
                for($j = 0; $j < count($request->tujuan_keluar); $j++) {
                    $tujuan_keluar[] = $request->tujuan_keluar[$j];
                }
                $data['tujuan_keluar'] = json_encode($tujuan_keluar);
            }

            if($request->has('tembusan')) {
                $tembusan = '';
                foreach ($request->input('tembusan') as $value) {
                    $tembusan .= $value .';';
                }
                $data['tembusan'] = substr($tembusan, 0, -1);
            }

            $tembusan_dinas = [];
            if($request->has('tembusan_dinas')) {
                for($j = 0; $j < count($request->tembusan_dinas); $j++) {
                    $dinas = explode('|', $request->tembusan_dinas[$j]);
                    // dd($dinas);
                    $tembusan_dinas[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tembusan_dinas'] = json_encode($tembusan_dinas);
            }

            if(count($request->tembusan_keluar) > 0) {
                for($j = 0; $j < count($request->tembusan_keluar); $j++) {
                    $tembusan_keluar[] = $request->tembusan_keluar[$j];
                }
                $data['tembusan_keluar'] = json_encode($tembusan_keluar);
            }

            SuratKeluar::create($data);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Terjadi kesalahan',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }

    public function edit($id)
    {
        $surat = SuratKeluar::find($id);
        $klasifikasi = KlasifikasiSurat::all();
        $tipe = TipeSurat::all();
        $kategori = [
            'Penting', 'Biasa', 'Rahasia', 'Undangan', 'Pengantar'
        ];
        $dinas = Dinas::pluck('nama', 'id')->toArray();

        $tembusan = explode(';', $surat->tembusan);

        $view = [
            'data' => view('main.surat-keluar.edit')->with([
                'klasifikasi' => $klasifikasi,
                'kategori' => $kategori,
                'dinas' => $dinas,
                'tipe' => $tipe,
                'surat' => $surat,
                'tembusan' => $tembusan,
            ])->render(),
        ];

        return response()->json($view);
    }

    public function update(SuratKeluarRequest $request)
    {
        try {
            $surat = SuratKeluar::find($request->id);
            $data = [
                'pengajuan_id' => $request->nomor_surat,
                'klasifikasi_id' => $request->klasifikasi,
                'tipe_id' => $request->tipe,
                'kategori' => $request->kategori,
                'perihal' => $request->perihal,
                'tanggal_surat' => $request->tanggal_surat,
                'catatan_pengingat' => $request->catatan ?? null,
            ];

            if($request->has('tujuan_surat')) {
                for($j = 0; $j < count($request->tujuan_surat); $j++) {
                    $tujuan_surat[] = $request->tujuan_surat[$j];
                }
                $data['tujuan_surat'] = json_encode($tujuan_surat);
            }

            $tujuan = [];
            if($request->has('tujuan')) {
                for($j = 0; $j < count($request->tujuan); $j++) {
                    $dinas = explode('|', $request->tujuan[$j]);
                    $tujuan[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tujuan'] = json_encode($tujuan);
            }

            if($request->has('tujuan_keluar')) {
                for($j = 0; $j < count($request->tujuan_keluar); $j++) {
                    $tujuan_keluar[] = $request->tujuan_keluar[$j];
                }
                $data['tujuan_keluar'] = json_encode($tujuan_keluar);
            }

            if($request->has('tembusan')) {
                $tembusan = '';
                foreach ($request->input('tembusan') as $value) {
                    $tembusan .= $value .';';
                }
                $data['tembusan'] = substr($tembusan, 0, -1);
            }

            $tembusan_dinas = [];
            if($request->has('tembusan_dinas')) {
                for($j = 0; $j < count($request->tembusan_dinas); $j++) {
                    $dinas = explode('|', $request->tembusan_dinas[$j]);
                    // dd($dinas);
                    $tembusan_dinas[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tembusan_dinas'] = json_encode($tembusan_dinas);
            }

            if(count($request->tembusan_keluar) > 0) {
                for($j = 0; $j < count($request->tembusan_keluar); $j++) {
                    $tembusan_keluar[] = $request->tembusan_keluar[$j];
                }
                $data['tembusan_keluar'] = json_encode($tembusan_keluar);
            }

            $surat->update($data);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Terjadi kesalahan',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }

    public function pengajuan($id)
    {
        $pengajuan = Pengajuan::find($id);
        return response()->json($pengajuan);
    }
}
