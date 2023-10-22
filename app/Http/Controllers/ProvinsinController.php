<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProvinsinController extends Controller
{
    public function index(): View
    {
        $data_provinsi = provinsi::orderBy('id', 'asc')->get();
        return view('provinsi', compact('data_provinsi'));
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama_provinsi' => 'required',
        ]);

        provinsi::create([
            'kode' => $request->kode,
            'nama_provinsi' => $request->nama_provinsi,
        ]);

        return redirect()->route('provinsi.index')->with('succes', 'Data provinsi berhasil ditambah');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama_provinsi' => 'required',
        ]);

        $data_provinsi = provinsi::find($id);

        $data_provinsi->update([
            'kode' => $request->kode,
            'nama_provinsi' => $request->nama_provinsi,
        ]);

        return redirect()->route('provinsi.index')->with('succes', 'Data provinsi berhasil ditambah');
    }

    public function destroy(Request $request, $id)
    {
        $data_provinsi = provinsi::findOrfail($id);

        $data_provinsi->delete();

        return back();
    }
}
