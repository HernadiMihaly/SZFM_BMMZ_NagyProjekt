<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kerdes;
use App\Models\Kerdoiv;
use App\Models\Valasz;

class ValaszController extends Controller
{

    public function store(Request $request)
    {
        file_put_contents("valaszcontroller.log", "store".PHP_EOL);
	file_put_contents("valaszcontroller.log", strval($request).PHP_EOL, FILE_APPEND);
//        file_put_contents("valaszcontroller.log", $request->input().PHP_EOL, FILE_APPEND);
        foreach($request->valaszok as $v){
            $valasz = new Valasz();
            $valasz->kerdes_id = $v["kerdes_id"];
            $valasz->question_filler = $v["question_filler"];
            if(array_key_exists("value", $v)){
                if(gettype($v["value"]) == "array"){
                    $valasz->value = implode('|', $v["value"]);
                } else {
                    $valasz->value = strval($v["value"]);
                }
                
            } else {
                $valasz->value = "";
            }
            $valasz->save();
        }
	
        $k = "OK";
	return response()->json($k, 201);
    }
    
    public function list(Kerdoiv $kerdoiv){
        $valaszok = DB::table('valasz')
            ->join('kerdes', 'kerdes.id', '=', 'valasz.kerdes_id')
            ->join('kerdoivek', 'kerdoivek.id', '=', 'kerdes.kerdoiv_id')
            ->where('kerdoivek.id', '=', $kerdoiv->id)
            ->get();
        return response()->json([
            'valaszok' => $valaszok,
            'kerdesek' => $kerdoiv->kerdesek
        ]);        
        //return response()->json($v, 200);
        
    }

}



