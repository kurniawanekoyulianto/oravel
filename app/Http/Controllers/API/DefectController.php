<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DefectController extends Controller
{
    public function store(Request $request){
        {
            $post = DB::insert("INSERT INTO SOLOMURNI.TBL_MASTER_DEFECT (ID_DEFECT, DEFECT, KODE_DEFECT, ID_DEPARTEMEN, CRITICAL, MAJOR, MINOR, CREATED_AT, UPDATED_AT) VALUES (
                '".$request->ID_DEFECT."', '".$request->DEFECT."', '".$request->KODE_DEFECT."', '".$request->ID_DEPARTEMEN."', '".$request->CRITICAL."', '".$request->MAJOR."', '".$request->MINOR."', '".$request->CREATED_AT."', '".$request->UPDATED_AT."')");

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

    public function destroy($id){
        $id_defect = $id;
        $id_defect = DB::select("SELECT ID_DEFECT FROM SOLOMURNI.TBL_MASTER_DEFECT WHERE ID_DEFECT='".$id_defect."'");

        $defect    = DB::table('SOLOMURNI.TBL_MASTER_DEFECT')->where('ID_DEFECT',$id_defect)->delete();
    }

    public function update(Request $request){
        $id_defect          = $request->ID_DEFECT;
        $defect             = $request->DEFECT;
        $kode_defect        = $request->KODE_DEFECT;
        $id_departemen      = $request->ID_DEPARTEMEN;
        $critical           = $request->CRITICAL;
        $major              = $request->MAJOR;
        $minor              = $request->MINOR;

        DB::table('SOLOMURNI.TBL_MASTER_DEFECT')->where('ID_DEFECT', $id_defect)
        ->update([
            'ID_DEFECT'             => $id_defect,
            'DEFECT'                => $defect,
            'KODE_DEFECT'           => $kode_defect,
            'ID_DEPARTEMEN'         => $id_departemen,
            'CRITICAL'              => $critical,
            'MAJOR'                 => $major,
            'MINOR'                 => $minor,
            'UPDATED_AT'            => date('Y-m-d H:i:s', strtotime('+0 hours'))
        ]);
    }
}
