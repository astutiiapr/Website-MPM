<?php

namespace App\Http\Controllers;

use App\Models\PusatData;
use Illuminate\Http\Request;

class PusatDataController extends Controller
{
    /**
     * Menampilkan daftar pusat data (Opsional jika ingin dipisahkan dari Dashboard)
     */
    public function index()
    {
        $pusat_data = PusatData::orderBy('id', 'asc')->get();
        return view('admin.pusat-data.index', compact('pusat_data'));
    }

    /**
     * Menyimpan dokumen baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi input data dokumen
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'url_link'     => 'required|url|max:500',
        ]);

        // Menyimpan ke database
        PusatData::create([
            'nama_dokumen' => $request->nama_dokumen,
            'url_link'     => $request->url_link,
        ]);

        return redirect()->route('dashboard')->with('success', 'Dokumen baru berhasil ditambahkan!');
    }

    /**
     * Memperbarui data dokumen yang sudah ada di database.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data dokumen
        $request->validate([
            'nama_dokumen' => 'required|string|max:255',
            'url_link'     => 'required|url|max:500',
        ]);

        $dokumen = PusatData::findOrFail($id);
        
        // Melakukan update data
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