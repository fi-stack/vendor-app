<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = Vendor::latest()->paginate(10);
        return view('vendor.index', compact('vendors'));
    }

    public function create()
    {
        return view('vendor.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_vendor' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        $vendor = Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        if ($vendor) {
            // redirect dengan pesan sukses
            return redirect()->route('vendor.index')->with(['success' => 'Data berhasil disimpan!']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('vendor.index')->with(['error' => 'Data gagal disimpan!']);
        }
    }

    public function edit(Vendor $vendor)
    {
        return view('vendor.edit', compact('vendor'));
    }

    public function update(Request $request, Vendor $vendor)
    {
        $this->validate($request, [
            'nama_vendor' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        // get data vendor by Id
        $vendor = vendor::findOrFail($vendor->id);

        $vendor->update([
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        if ($vendor) {
            // redirect dengan pesan sukses
            return redirect()->route('vendor.index')->with(['success' => 'Data berhasil diupdate!']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('vendor.index')->with(['error' => 'Data Gagal diupdate!']);
        }
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);
        $vendor->delete();

        if ($vendor) {
            // redirect dengan pesan sukses
            return redirect()->route('vendor.index')->with(['success' => 'Data berhasil dihapus!']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('vendor.index')->with(['error' => 'Data gagal dihapus!']);
        }
    }
}
