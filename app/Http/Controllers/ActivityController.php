<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy('id', 'desc')->get();
        return view('activity.index', ['activities' => $activities]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan'       => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'foto_kegiatan'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'           => 'nullable|string',
        ]);

        // Menggunakan string kosong sebagai default agar lolos aturan NOT NULL di database
        $namaFoto = ''; 

        if ($request->hasFile('foto_kegiatan')) {
            $foto = $request->file('foto_kegiatan');
            $destinationPath = public_path('images/activities');
            
            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }

            $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $namaFoto);
        }

        Activity::create([
            'nama_kegiatan'       => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'foto_kegiatan'       => $namaFoto,
            'deskripsi'           => $request->deskripsi ?? '-',
        ]);

        return redirect()->route('dashboard')->with('success', 'Kegiatan baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan'       => 'required|string|max:255',
            'tanggal_pelaksanaan' => 'required|date',
            'foto_kegiatan'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'           => 'nullable|string',
        ]);

        $activity = Activity::findOrFail($id);
        $namaFoto = $activity->foto_kegiatan ?? ''; 

        if ($request->hasFile('foto_kegiatan')) {
            $destinationPath = public_path('images/activities');

            if ($activity->foto_kegiatan && $activity->foto_kegiatan !== '' && File::exists($destinationPath . '/' . $activity->foto_kegiatan)) {
                File::delete($destinationPath . '/' . $activity->foto_kegiatan);
            }

            $foto = $request->file('foto_kegiatan');
            $namaFoto = time() . '_' . uniqid() . '.' . $foto->getClientOriginalExtension();
            $foto->move($destinationPath, $namaFoto);
        }

        $activity->update([
            'nama_kegiatan'       => $request->nama_kegiatan,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'foto_kegiatan'       => $namaFoto,
            'deskripsi'           => $request->deskripsi ?? $activity->deskripsi,
        ]);

        return redirect()->route('dashboard')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $destinationPath = public_path('images/activities');

        if ($activity->foto_kegiatan && $activity->foto_kegiatan !== '' && File::exists($destinationPath . '/' . $activity->foto_kegiatan)) {
            File::delete($destinationPath . '/' . $activity->foto_kegiatan);
        }

        $activity->delete();
        return redirect()->route('dashboard')->with('success', 'Kegiatan berhasil dihapus!');
    }
}