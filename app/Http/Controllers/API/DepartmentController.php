<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller {
	public function index(){
		$getdata = DB::select("SELECT * FROM solomurni.tbl_master_departemen");
		return $getdata;
	}
}