<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Exports\UnduhExport;
use App\Models\Absensi;
use App\Http\Requests\StoreAbsensiRequest;
use App\Http\Requests\UpdateAbsensiRequest;
use App\Imports\AbsensiImport;
use Exception;
use Illuminate\Database\QueryException;
use PDOException;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['absensi'] = Absensi::orderBy('created_at', 'DESC')->get();

            return view('absensi.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponses($error->getMessage(), $error->getCode());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        Absensi::create($request->all());
        return redirect('absensi')->with('success', 'Data Absensi berhasil ditambahkan!');
    }

    public function absensiPdf()
    {
        $date = date('Y-m-d');
        $data = Absensi::all();
        $pdf = PDF::loadView('absensi/absensi-pdf', ['absensi' => $data]);
        return $pdf->download($date . '_absensi.pdf');
    }

    public function absensiExport()
    {
        $date = date('Y-m-d');
        return Excel::download(new AbsensiExport, $date . '_absensi.xlsx');
    }
    public function unduhExport()
    {
        $date = date('Y-m-d');
        return Excel::download(new UnduhExport, $date . '_formatAbsensi.xlsx');
        // return (new UnduhExport())->dow('nama-file.xlsx');
    }

    public function importData(Request $request)
    {
        Excel::import(new AbsensiImport, $request->import);
        return redirect()->back()->with('success', 'Import data Absensi berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        //
    }

    // public function simpanWaktu(Request $request)
    // {
    //     try {
    //         // Validasi input
    //         $request->validate([
    //             'id' => 'required|exists:absensi,id', // Pastikan id yang dikirim ada dalam tabel absensi
    //             'waktu' => 'required|date_format:Y-m-d H:i:s', // Pastikan waktu memiliki format yang sesuai
    //         ]);

    //         $id = $request->input('id');
    //         $waktu = $request->input('waktu');

    //         // Cari data absensi
    //         $absensi = Absensi::find($id);

    //         // Simpan waktu ke dalam database
    //         $absensi->waktu_masuk = $waktu;
    //         $absensi->save();

    //         // Beri respons sukses
    //         return response()->json(['message' => 'Waktu berhasil disimpan'], 200);
    //     } catch (\Exception $e) {
    //         // Tangani kesalahan dengan baik
    //         return response()->json(['error' => 'Terjadi kesalahan saat menyimpan waktu', 'message' => $e->getMessage()], 500);
    //     }
    // }




    /**
     * Update the specified resource in storage.
     */
    public function updateStatus(Request $request)
    {
        $row_num = $request->input('row_num');
        $new_status = $request->input('new_status');

        // Temukan data absensi dengan nomor baris yang sesuai
        $absen = Absensi::find($row_num);

        // Jika data absensi tidak ditemukan, kembalikan respons dengan pesan error
        if (!$absen) {
            return response()->json(['error' => 'Data absensi tidak ditemukan', 'id' => $row_num], 404);
        }

        // Perbarui status absensi
        $absen->status = $new_status;
        $absen->save();

        return response()->json(['message' => 'Status updated successfully']);
    }

    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->all());

        return redirect('absensi')->with('success', 'Update data berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return redirect('absensi')->with('success', 'Data Absensi berhasil dihapus!');
    }
}
