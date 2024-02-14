<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = Pasien::with('rumahsakit')->get();
        $rumahsakit = RumahSakit::all();
        return view('pasien.index', [
            'data' => $data,
            'rumahsakit' => $rumahsakit
        ]);
    }

    public function add()
    {
        $rumahsakit = RumahSakit::all();
        return view('pasien.add', [
            'rumahsakit' => $rumahsakit
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric|digits_between:10,13',
        ]);

        $pasien = new Pasien();
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->id_rumah_sakit = $request->id_rumah_sakit;

        $pasien->save();

        return redirect()->back()->with('success', 'Pasien berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $pasien = Pasien::with('rumahsakit')->findOrFail($id);
        $rumahsakit = RumahSakit::all();
        return view('pasien.edit', compact('pasien', 'rumahsakit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric|digits_between:10,13',
        ]);

        $pasien = Pasien::findOrFail($id);

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->telepon = $request->telepon;
        $pasien->id_rumah_sakit = $request->id_rumah_sakit;

        $pasien->save();

        return redirect()->route('pasien')->with('success', 'Pasien berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();
        return response()->json(['message' => 'Pasien berhasil dihapus']);
    }

    public function filterByRumahSakit(Request $request)
    {
        $rumahSakitId = $request->input('id_rumah_sakit');

        if ($rumahSakitId) {
            $data = Pasien::where('id_rumah_sakit', $rumahSakitId)->with('rumahsakit')->get();
        } else {
            $data = Pasien::with('rumahsakit')->get();
        }

        return response()->json($data);
    }
}
