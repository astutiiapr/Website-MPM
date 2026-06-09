<?php

namespace App\Http\Controllers;

use App\Models\PusatData; // Pastikan model diimpor dengan benar
use Illuminate\Http\Request;

class PusatDataController extends Controller
{
    /**
     * Menampilkan daftar pusat data untuk pengunjung umum (Publik).
     */
    public function index()
    {
        // Mengambil seluruh data dokumen dari database db_mpm_laravel
        $pusat_data = PusatData::orderBy('id', 'asc')->get();
        
        // Diarahkan ke view folder publik: resources/views/pusatdata/index.blade.php
        return view('pusatdata.index', compact('pusat_data'));
    }

    /**
     * Menyimpan dokumen baru dari form Dashboard ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'url_link'     => 'required|url|max:500',
        ]);

        PusatData::create([
            'nama_dokumen' => $request->nama_dokumen,
            'url_link'     => $request->url_link,
        ]);

        return redirect()->route('dashboard')->with('success', 'Dokumen baru berhasil ditambahkan!');
    }

    /**
     * Memperbarui data dokumen melalui modal Dashboard.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'url_link'     => 'required|url|max:500',
        ]);

        $dokumen = PusatData::findOrFail($id);
        
        $dokumen->update([
            'nama_dokumen' => $request->nama_dokumen,
            'url_link'     => $request->url_link,
        ]);

        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil diperbarui!');
    }

    /**
     * Menghapus dokumen dari database.
     */
    public function destroy($id)
    {
        $dokumen = PusatData::findOrFail($id);
        $dokumen->delete();

        return redirect()->route('dashboard')->with('success', 'Dokumen berhasil dihapus!');
    }
}
