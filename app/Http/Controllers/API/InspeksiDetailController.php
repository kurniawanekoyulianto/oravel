<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\InspeksiDetailResource;
use Illuminate\Support\Facades\DB;


class InspeksiDetailController extends Controller
{
    public function store(Request $request){
        {
            $post = DB::insert("INSERT INTO SOLOMURNI.TBL_INSPEKSI_DETAIL (ID_INSPEKSI_DETAIL, ID_INSPEKSI_HEADER, ID_MESIN, QTY_1, QTY_5, PIC, JAM_MULAI, JAM_SELESAI, LAMA_INSPEKSI, JOP, ITEM, ID_DEFECT, KRITERIA, QTY_DEFECT, QTY_READY_PCS, QTY_SAMPLING, PENYEBAB, STATUS, KETERANGAN, QTY_READY_PACK, QTY_SAMPLE_AQL, QTY_SAMPLE_RIIL, QTY_REJECT_ALL, HASIL_VERIFIKASI, CREATED_AT, CREATOR, UPDATED_AT, UPDATER, ID_SATUAN, SATUAN_QTY_TEMUAN, SATUAN_QTY_READY_PCS, SATUAN_QTY_SAMPLING, SATUAN_QTY_READY_PACK, SATUAN_QTY_SAMPLE_AQL, SATUAN_QTY_SAMPLE_RIIL, SATUAN_QTY_REJECT_ALL) VALUES (
                '".$request->ID_INSPEKSI_DETAIL."', '".$request->ID_INSPEKSI_HEADER."', '".$request->ID_MESIN."', '".$request->QTY_1."', '".$request->QTY_5."', '".$request->PIC."', '".$request->JAM_MULAI."', '".$request->JAM_SELESAI."', '".$request->LAMA_INSPEKSI."', '".$request->JOP."', '".$request->ITEM."', '".$request->ID_DEFECT."', '".$request->KRITERIA."', '".$request->QTY_DEFECT."', '".$request->QTY_READY_PCS."', '".$request->QTY_SAMPLING."', '".$request->PENYEBAB."', '".$request->STATUS."', '".$request->KETERANGAN."', '".$request->QTY_READY_PACK."', '".$request->QTY_SAMPLE_AQL."', '".$request->QTY_SAMPLE_RIIL."', '".$request->QTY_REJECT_ALL."', '".$request->HASIL_VERIFIKASI."', '".$request->CREATED_AT."', '".$request->CREATOR."', '".$request->UPDATED_AT."', '".$request->UPDATER."', '".$request->ID_SATUAN."', '".$request->SATUAN_QTY_TEMUAN."', '".$request->SATUAN_QTY_READY_PCS."', '".$request->SATUAN_QTY_SAMPLING."', '".$request->SATUAN_QTY_READY_PACK."', '".$request->SATUAN_QTY_SAMPLE_AQL."', '".$request->SATUAN_QTY_SAMPLE_RIIL."', '".$request->SATUAN_QTY_REJECT_ALL."')");

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
        $id_detail = $id;
        $id_header = DB::select("SELECT id_inspeksi_header FROM SOLOMURNI.TBL_INSPEKSI_DETAIL WHERE id_inspeksi_detail='".$id_detail."'");
        $id_header = $id_header[0]->id_inspeksi_header;

        $count_detail = DB::select("SELECT COUNT($id_detail) as count FROM SOLOMURNI.TBL_INSPEKSI_DETAIL WHERE id_inspeksi_header='".$id_header."' GROUP BY id_inspeksi_header");

        $count = $count_detail[0]->count;

        if ($count == 1){
            $inline_detail  = DB::table('SOLOMURNI.TBL_INSPEKSI_DETAIL')->where('id_inspeksi_detail',$id_detail)->delete();
            $inline_detail  = DB::table('SOLOMURNI.TBL_INSPEKSI_HEADER')->where('id_inspeksi_header',$id_header)->delete();
        }else if($count > 1) {
            $inline_detail  = DB::table('SOLOMURNI.TBL_INSPEKSI_DETAIL')->where('id_inspeksi_detail',$id_detail)->delete();
        }
    }
}
