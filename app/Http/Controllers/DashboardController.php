<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PusatData;
use App\Models\Activity; // Perbaikan: Mengimpor model Activity agar tidak terjadi error "Class not found"
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard admin beserta ringkasan datanya.
     *
     * @return \Illuminate\View\View
     */
    public function index() 
    {
        // Mengambil jumlah total dokumen dari tabel pusat_data
        $total_dokumen = PusatData::count();

        // Mengambil semua data pusat data, diurutkan berdasarkan ID terkecil
        $pusat_data = PusatData::orderBy('id', 'asc')->get();

        // Mengambil semua data kegiatan (activity), diurutkan berdasarkan tanggal pelaksanaan terbaru
        $activities = Activity::orderBy('tanggal_pelaksanaan', 'desc')->get();

        // Mengirimkan semua data ke view dashboard.blade.php
        return view('dashboard', compact('total_dokumen', 'pusat_data', 'activities'));
    }
}