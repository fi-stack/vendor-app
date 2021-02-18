<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VendorApiController extends Controller
{
    public function index()
    {
        $posts = Vendor::latest()->get();

        return response()->json([
            'success' => true,
            'message' => 'List Data Vendor',
            'data' => $posts
        ], 200);
    }

    public function show($id)
    {
        $post = Vendor::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Vendor',
            'data' => $post
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

        $post = Vendor::create([
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kode_pos' => $request->kode_pos,
        ]);

        // success save to database
        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Vendor Created',
                'data' => $post
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Vendor Failed to Save',
        ], 409);
    }
}
