<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kelurahan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KelurahanController extends Controller
{
    public function index(): View
    {
        $data_kelurahan = kelurahan::with(['kecamatan'])->orderBy('id', 'asc')->get();
        $kecamatans = kecamatan::get();
        return view('kelurahan', compact('data_kelurahan', 'kecamatans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kode_kel' => 'required',
            'nama_kel' => 'required',
            'id_kec' => 'required'
        ]);

        kecamatan::create([
            'kode_kel' => $request->kode_kel,
            'nama_kel' => $request->nama_kel,
            'id_kec'
        ]);

        return redirect()->route('kelurahan.index')->with('succes', 'Data kecamatan berhasil ditambah');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kode_kel' => 'required',
            'nama_kel' => 'required',
            'id_kec' => 'required'
        ]);

        $data_kelurahan = kelurahan::findOrfail($id);

        $data_kelurahan->update([
            'kode_kel' => $request->kode_kel,
            'nama_kel' => $request->nama_kel,
            'id_kec' => $request->id_kec
        ]);

        return redirect()->route('kelurahan.index')->with('succes', 'Data kecamatan berhasil ditambah');
    }

    public function destroy(Request $request, $id)
    {
        $data_kelurahan = kelurahan::findOrfail($id);

        $data_kelurahan->delete();

        return back();
    }
}
