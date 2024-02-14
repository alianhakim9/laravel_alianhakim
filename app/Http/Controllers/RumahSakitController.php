<?php

namespace App\Http\Controllers;

use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $data = RumahSakit::all();
        return view('rumahsakit.index', [
            'data' => $data
        ]);
    }

    public function add()
    {
        return view('rumahsakit.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:rumah_sakits,email',
            'telepon' => 'required|numeric|digits_between:10,13',
        ]);

        $rumahSakit = new RumahSakit();
        $rumahSakit->nama = $request->nama;
        $rumahSakit->alamat = $request->alamat;
        $rumahSakit->email = $request->email;
        $rumahSakit->telepon = $request->telepon;

        $rumahSakit->save();

        return redirect()->back()->with('success', 'Rumah Sakit berhasil ditambahkan!');
    }
    public function edit($id)
    {
        // Mengambil data rumah sakit berdasarkan ID
        $rumahSakit = RumahSakit::findOrFail($id);

        // Mengirim data ke view edit
        return view('rumahsakit.edit', compact('rumahSakit'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|unique:rumah_sakits,email,' . $id,
            'telepon' => 'required|numeric|digits_between:10,13',
        ]);

        // Mengambil data rumah sakit berdasarkan ID
        $rumahSakit = RumahSakit::findOrFail($id);

        // Mengisi data rumah sakit dengan data baru dari form
        $rumahSakit->nama = $request->nama;
        $rumahSakit->alamat = $request->alamat;
        $rumahSakit->email = $request->email;
        $rumahSakit->telepon = $request->telepon;

        // Menyimpan perubahan ke database
        $rumahSakit->save();

        // Redirect kembali ke halaman daftar rumah sakit dengan pesan sukses
        return redirect()->route('rumahsakit')->with('success', 'Rumah Sakit berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $rumahSakit = RumahSakit::findOrFail($id);
        $rumahSakit->delete();
        return response()->json(['message' => 'Rumah Sakit berhasil dihapus']);
    }
}
