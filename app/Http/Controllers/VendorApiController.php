<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

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
}
