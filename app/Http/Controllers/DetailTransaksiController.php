<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use App\Models\DetailTransaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = Transaksi::with(['detailTransaksi'])->get();
        return view('laporan.index')->with($data);
    }

    public function filter(Request $request)
    {
        $tanggal_awal = $request->input('tanggal_awal');
        $tanggal_akhir = $request->input('tanggal_akhir');

        $laporan = Transaksi::whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])->get();

        return view('laporan.index', [
            'laporan' => $laporan,
            'page' => 'Laporan Penjualan',
            'section' => 'Laporan'
        ]);
    }

    public function laporanPdf()
    {
        $date = date('Y-m-d');
        $data = Transaksi::all();
        $pdf = PDF::loadView('laporan/laporan-pdf', ['transaksi' => $data]);
        return $pdf->download($date . '_laporan.pdf');
    }

    public function laporanExport()
    {
        $date = date('Y-m-d');
        return Excel::download(new LaporanExport, $date . '_laporan.xlsx');
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
    public function store(StoreDetailTransaksiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
    }
}
