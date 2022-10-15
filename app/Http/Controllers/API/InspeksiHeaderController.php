<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InspeksiHeaderResource;
use Illuminate\Support\Facades\DB;

class InspeksiHeaderController extends Controller
{
    public function store(Request $request){
        $post = DB::insert("INSERT INTO SOLOMURNI.TBL_INSPEKSI_HEADER (ID_INSPEKSI_HEADER, TYPE_FORM, TGL_INSPEKSI, SHIFT, ID_USER, ID_DEPARTEMEN, ID_SUB_DEPARTEMEN, CREATED_AT, UPDATED_AT, JENIS_USER) VALUES ('".$request->ID_INSPEKSI_HEADER."', '".$request->TYPE_FORM."', '".$request->TGL_INSPEKSI."', '".$request->SHIFT."', '".$request->ID_USER."', '".$request->ID_DEPARTEMEN."', '".$request->ID_SUB_DEPARTEMEN."', '".$request->CREATED_AT."', '".$request->UPDATED_AT."', '".$request->JENIS_USER."')");

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Disimpan!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Disimpan!',
            ], 401);
        }
    }
}

