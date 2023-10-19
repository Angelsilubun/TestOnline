<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KecamatanController extends Controller
{
    public function index(): View
    {
        $data_kecamatan = kecamatan::orderBy('id', 'asc')->get();
        return view('kecamatan', compact('data_kecamatan'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kode_kec' => 'required',
            'nama_kecamatan' => 'required',
        ]);

        kecamatan::create([
            'kode_kec' => $request->kode_kec,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        return redirect()->route('kecamatan.index')->with('succes', 'Data kecamatan berhasil ditambah');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kode_kec' => 'required',
            'nama_kecamatan' => 'required',
        ]);

        $data_kecamatan = kecamatan::findOrfail($id);

        kecamatan::update([
            'kode_kec' => $request->kode_kec,
            'nama_kecamatan' => $request->nama_kecamatan,
        ]);

        return redirect()->route('kecamatan.index')->with('succes', 'Data kecamatan berhasil ditambah');
    }

    public function destroy(Request $request, $id)
    {
        $data_kecamatan = kecamatan::findOrfail($id);

        $data_kecamatan->delete();

        return back();
    }
}
