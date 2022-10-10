<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TestController extends Controller
{
    public function Index(){
		$data_sql = DB::select("SELECT * FROM REST.tbl_master_departemen");
		
		return $data_sql;	
	}
}