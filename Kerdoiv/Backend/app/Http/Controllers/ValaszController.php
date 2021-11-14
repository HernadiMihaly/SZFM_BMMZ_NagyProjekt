<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerdes;
use App\Models\Valasz;

class ValaszController extends Controller
{

    public function store(Request $request)
    {
        file_put_contents("valaszcontroller.log", "valasz_store".PHP_EOL);
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

}
