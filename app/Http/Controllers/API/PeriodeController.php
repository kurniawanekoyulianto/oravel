<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PeriodeController extends Controller
{
    public function index(){
		$getdata = DB::select("SELECT * FROM solomurni.tbl_master_periode");
		return $getdata;
	}

    public function store(Request $request){
        {
            $post = DB::insert("INSERT INTO SOLOMURNI.TBL_MASTER_PERIODE (ID_PERIODE, TAHUN, BULAN, MINGGU_KE, TGL_MULAI_PERIODE, TGL_AKHIR_PERIODE, CREATED_AT, UPDATED_AT, URUTAN) VALUES (
                '".$request->ID_PERIODE."', '".$request->TAHUN."', '".$request->BULAN."', '".$request->MINGGU_KE."', '".$request->TGL_MULAI_PERIODE."', '".$request->TGL_AKHIR_PERIODE."', '".$request->CREATED_AT."', '".$request->UPDATED_AT."', '".$request->URUTAN."')");

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
            // }
        }
    }

    public function destroy($id){
        $id_periode = $id;
        DB::table('SOLOMURNI.TBL_MASTER_PERIODE')->where('id_periode',$id_periode)->delete();
    }

    public function update(Request $request){
        $id_periode         = $request->ID_PERIODE;
        $tahun              = $request->TAHUN;
        $bulan              = $request->BULAN;
        $minggu_ke          = $request->MINGGU_KE;
        $tgl_mulai_periode  = $request->TGL_MULAI_PERIODE;
        $tgl_akhir_periode  = $request->TGL_AKHIR_PERIODE;
        $urutan             = $request->URUTAN;

        DB::table('SOLOMURNI.TBL_MASTER_PERIODE')->where('id_periode', $id_periode)
        ->update([
            'TAHUN'             => $tahun,
            'BULAN'             => $bulan,
            'MINGGU_KE'         => $minggu_ke,
            'TGL_MULAI_PERIODE' => $tgl_mulai_periode,
            'TGL_AKHIR_PERIODE' => $tgl_akhir_periode,
            'URUTAN'            => $urutan,
            'UPDATED_AT'        => date('Y-m-d H:i:s', strtotime('+0 hours'))
        ]);


    }
}
