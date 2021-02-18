<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorApiController extends Controller
{
    public function index()
    {
        $vendors = Vendor::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Vendor',
            'data' => $vendors
        ], 200);
    }

    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Vendor',
            'data' => $vendor
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_vendor' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $vendor = Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        // success save to database
        if ($vendor) {
            return response()->json([
                'success' => true,
                'message' => 'Vendor Created',
                'data' => $vendor
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Vendor Failed to Save',
        ], 409);
    }

    public function update(Request $request, Vendor $vendor)
    {
        $validator = Validator::make($request->all(), [
            'nama_vendor' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'kode_pos' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $vendor = Vendor::findOrFail($vendor->id);

        if ($vendor) {
            $vendor->update([
                'nama_vendor' => $request->nama_vendor,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'provinsi' => $request->provinsi,
                'kode_pos' => $request->kode_pos,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Vendor Updated',
                'data' => $vendor
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Vendor Not Found',
        ], 404);
    }

    public function destroy($id)
    {
        $vendor = Vendor::findOrFail($id);

        if ($vendor) {

            $vendor->delete();

            return response()->json([
                'success' => true,
                'message' => 'vendor Deleted',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'vendor Not Found',
        ], 404);
    }
}
