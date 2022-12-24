<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuratMasukRequest;
use App\Models\Dinas;
use App\Models\KlasifikasiSurat;
use App\Models\SuratMasuk;
use App\Models\UnitKerja;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    public function index()
    {
        return view('main.surat-masuk.index');
    }

    public function render()
    {
        $surat = SuratMasuk::with('klasifikasi')->get();

        $view = [
            'data' => view('main.surat-masuk.render', compact('surat'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $klasifikasi = KlasifikasiSurat::all();
        $kategori = [
            'Penting', 'Biasa', 'Rahasia', 'Undangan', 'Pengantar'
        ];
        $dinas = Dinas::pluck('nama', 'id')->toArray();
        $unit = UnitKerja::pluck('nama', 'id')->toArray();
        $view = [
            'data' => view('main.surat-masuk.create', compact('klasifikasi', 'kategori', 'dinas', 'unit'))->render(),
        ];

        return response()->json($view);
    }

    public function store(SuratMasukRequest $request)
    {
        // dd($request->all());
        try {
            $data = [
                'pengirim' => $request->pengirim,
                'klasifikasi_id' => $request->klasifikasi,
                'kategori' => $request->kategori,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                // 'dinas_id' => $request->tembusan,
                // 'tembusan_khusus' => json_encode($request->tembusan_khusus),
                'tanggal_surat' => $request->tanggal_surat,
                'unit_kerja_id' => $request->unit_kerja
            ];

            $tembusan = [];
            if(count($request->tembusan) > 0) {
                for($j = 0; $j < count($request->tembusan); $j++) {
                    $dinas = explode('|', $request->tembusan[$j]);
                    // dd($dinas);
                    $tembusan[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tembusan'] = json_encode($tembusan);
            }

            if(count($request->tembusan_khusus) > 0) {
                $tembusan_khusus = '';
                foreach ($request->input('tembusan_khusus') as $value) {
                    $tembusan_khusus .= $value .';';
                }
                $data['tembusan_khusus'] = substr($tembusan_khusus, 0, -1);
            }

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

            $lampiran = [];
            if($request->hasFile('file_lampiran')) {
                for($i = 0; $i < count($request->file('file_lampiran')); $i++) {
                    //get filename with extension
                    $filenamewithextension = $request->file('file_lampiran')[$i]->getClientOriginalName();
        
                    //get file extension
                    $extension = $request->file('file_lampiran')[$i]->getClientOriginalExtension();
    
                    //filename to store
                    $filenametostore = 'file_lampiran-' . ($i + 1) . '-' . time() . '.' . $extension;
                    $save_path = 'assets/uploads/surat-masuk/lampiran';
                    
                    if (!file_exists($save_path)) {
                        mkdir($save_path, 666, true);
                    }

                    $request->file('file_lampiran')[$i]->move($save_path, $filenametostore);

                    $data['file_lampiran'] = $save_path . '/' . $filenametostore;

                    $lampiran[] = [
                        'id' => $i+1,
                        'lampiran' => $save_path . '/' . $filenametostore
                    ];
                }

                $file_lampiran = json_encode($lampiran);
                $data['file_lampiran'] = $file_lampiran;
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
                // 'message' => 'Terjadi kesalahan',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }

    public function edit($id) 
    {
        $surat = SuratMasuk::find($id);
        $klasifikasi = KlasifikasiSurat::all();
        $kategori = [
            'Penting', 'Biasa', 'Rahasia', 'Undangan', 'Pengantar'
        ];
        $dinas = Dinas::pluck('nama', 'id')->toArray();
        $unit = UnitKerja::pluck('nama', 'id')->toArray();

        $tembusan_explode = explode(';', $surat->tembusan_khusus);

        $tembusan = [];
        foreach(json_decode($surat->tembusan, true) as $key => $tem) {
            $tembusan[] = $tem['dinas_id'] . '|' . $tem['nama'];
        }

        $view = [
            'data' => view('main.surat-masuk.edit', compact('klasifikasi', 'kategori', 'dinas', 'unit', 'surat', 'tembusan_explode', 'tembusan'))->render(),
        ];

        return response()->json($view);
    }

    public function update(SuratMasukRequest $request)
    {
        try {
            $surat = SuratMasuk::find($request->id);
            $data = [
                'pengirim' => $request->pengirim,
                'klasifikasi_id' => $request->klasifikasi,
                'kategori' => $request->kategori,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'tanggal_surat' => $request->tanggal_surat,
                'unit_kerja_id' => $request->unit_kerja
            ];

            $tembusan = [];
            if(count($request->tembusan) > 0) {
                for($j = 0; $j < count($request->tembusan); $j++) {
                    $dinas = explode('|', $request->tembusan[$j]);
                    // dd($dinas);
                    $tembusan[] = [
                        'dinas_id' => $dinas[0],
                        'nama' => $dinas[1],
                    ];
                }
                $data['tembusan'] = json_encode($tembusan);
            }

            if($request->has('tembusan_khusus')) {
                $tembusan_khusus = '';
                foreach ($request->input('tembusan_khusus') as $value) {
                    $tembusan_khusus .= $value .';';
                }
                $data['tembusan_khusus'] = substr($tembusan_khusus, 0, -1);
                // if(count($request->tembusan_khusus) > 0) {
                // }
            } else {
                $data['tembusan_khusus'] = null;
            }

            if($request->hasFile('file_surat')) {
                unlink($surat->file_surat);
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

            // last id on file lampiran
            $file_lampiran = json_decode($surat->file_lampiran, true);
            $last_id = $file_lampiran[count($file_lampiran)-1]['id'];
            if($request->hasFile('file_lampiran')) {
                for($i = 0; $i < count($request->file('file_lampiran')); $i++) {
                    //get filename with extension
                    $filenamewithextension = $request->file('file_lampiran')[$i]->getClientOriginalName();
        
                    //get file extension
                    $extension = $request->file('file_lampiran')[$i]->getClientOriginalExtension();
    
                    //filename to store
                    $filenametostore = 'file_lampiran-' . $last_id+($i + 1) . '-' . time() . '.' . $extension;
                    $save_path = 'assets/uploads/surat-masuk/lampiran';
                    
                    if (!file_exists($save_path)) {
                        mkdir($save_path, 666, true);
                    }

                    $request->file('file_lampiran')[$i]->move($save_path, $filenametostore);

                    $data['file_lampiran'] = $save_path . '/' . $filenametostore;

                    $file_lampiran[] = [
                        'id' => $last_id+($i + 1),
                        'lampiran' => $save_path . '/' . $filenametostore
                    ];
                }

                $new_lampiran = json_encode($file_lampiran);
                $data['file_lampiran'] = $new_lampiran;
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

    public function lampiran($id)
    {
        $surat = SuratMasuk::find($id);

        return response()->json(json_decode($surat->file_lampiran));
    }

    public function hapusLampiran($surat_id, $lampiran_id)
    {
        try {
            $surat = SuratMasuk::find($surat_id);

            $lampiran = json_decode($surat->file_lampiran, true);
            
            $keys = array();

            foreach($lampiran as $key => $val) {
                $subkeys = array_keys($val, $lampiran_id);
                if(!empty($subkeys)) {
                    $keys[] = $key;
                }
            }
            unlink($lampiran[$keys[0]]['lampiran']);
            unset($lampiran[$keys[0]]);

            $surat->update([
                'file_lampiran' => json_encode($lampiran)
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan',
                // 'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }
}
