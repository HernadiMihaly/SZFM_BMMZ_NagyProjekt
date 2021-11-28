<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kerdoiv;
use App\Models\Kerdes;

class KerdoivController extends Controller
{
    public function index()
    {
        return Kerdoiv::all();
    }
 
    public function show(Kerdoiv $kerdoiv)
    {
        $temp = response()->json($kerdoiv);
        $kerdesek = response()->json($kerdoiv->kerdesek);
        return response()->json([
            'kerdoiv' => $kerdoiv,
            'kerdesek' => $kerdoiv->kerdesek
        ]);
    }

    public function store(Request $request)
    {
	file_put_contents("kerdoivecontroller.log", "store".PHP_EOL);
	file_put_contents("kerdoivecontroller.log", strval($request).PHP_EOL, FILE_APPEND);
	$k = new Kerdoiv;
        $requestKerdoiv = $request->kerdoiv;
	$k->title = $requestKerdoiv["title"];
	$k->is_separated = $requestKerdoiv["is_separated"];
	$k->is_randomised = $requestKerdoiv["is_randomised"];
	$ks = $requestKerdoiv["kerdesek"];
	$k->save();
	file_put_contents("kerdoivecontroller.log", gettype($ks).PHP_EOL, FILE_APPEND);
	$kerdesek = [];
	foreach($ks as $tk) {
            $kerdes = new Kerdes;
	    $kerdes->kerdoiv_id = NULL;
	    $kerdes->order_number = $tk['order_number'];
            $kerdes->question = $tk['question'];	
            $kerdes->type= $tk['type'];	
            $kerdes->is_predictive = $tk['is_predictive'];
            if(array_key_exists("correct_answer", $tk)){
                file_put_contents("kerdoivecontroller.log", "array_key_exists".PHP_EOL, FILE_APPEND);
                $kerdes->correct_answer = $tk['correct_answer'];	
            } else {
                file_put_contents("kerdoivecontroller.log", "not".PHP_EOL, FILE_APPEND);
                $kerdes->correct_answer = "";
            }
            if($kerdes->correct_answer == null){
                $kerdes->correct_answer = "";
            }
            file_put_contents("kerdoivecontroller.log", $kerdes->correct_answer.PHP_EOL, FILE_APPEND);
            
            
            $kerdesek[] = $kerdes;
            file_put_contents("kerdoivecontroller.log", $kerdes.PHP_EOL, FILE_APPEND);
	    /*
	    foreach($tk as $key => $tt) {
		file_put_contents("kerdoivecontroller.log", $key." : ".$tt.PHP_EOL, FILE_APPEND);
            }
            */
	}
	$k->kerdesek()->saveMany($kerdesek);

	//$k = Kerdoiv::create($request->all());
        $k->save();
	return response()->json($k, 201);
	/*
	$temp = json_decode($request->all());
	//var_dump($temp);
	//$kerdoiv = Kerdoiv::create($temp);
	$kerdoiv = Kerdoiv::create($request->all());
        return response()->json($kerdoiv, 201);
	*/
    }

    public function update(Request $request, Kerdoiv $kerdoiv)
    {
        file_put_contents("kerdoivecontroller.log", "r:".strval($request).PHP_EOL);
        file_put_contents("kerdoivecontroller.log", "------------------".strval($kerdoiv).PHP_EOL, FILE_APPEND);
        //$kerdoiv->update($request->all());
        $requestKerdoiv = $request->kerdoiv;
        $kerdoiv->title = $requestKerdoiv["title"];
        $kerdoiv->is_separated = $requestKerdoiv["is_separated"];
        $kerdoiv->is_randomised = $requestKerdoiv["is_randomised"];
        
        $ks = $requestKerdoiv["kerdesek"];
        $kerdesek = [];
        $megtartando_kerdes_id =[];
        foreach($ks as $tk) {
            if(array_key_exists("id", $tk)){
                $kerdes = Kerdes::find($tk["id"]);
                $megtartando_kerdes_id[] = $tk["id"];
            } else {
                $kerdes = new Kerdes;
            }
            $kerdes->order_number = $tk['order_number'];
            $kerdes->question = $tk['question'];	
            $kerdes->type= $tk['type'];	
            /*if(array_key_exists("is_predictive", $tk)){
                $kerdes->is_predictive = $tk['is_predictive'];	
            } else {
                $kerdes->is_predictive = false;
            }*/
            $kerdes->is_predictive = $tk['is_predictive'];
            if(array_key_exists("answers", $tk)){
                $kerdes->answers = $tk['answers'];	
            } else {
                $kerdes->answers = "";
            }
            if($kerdes->answers == null){
                $kerdes->answers = "";
            }
            if(array_key_exists("correct_answer", $tk)){
                file_put_contents("kerdoivecontroller.log", "array_key_exists".PHP_EOL, FILE_APPEND);
                $kerdes->correct_answer = $tk['correct_answer'];	
            } else {
                file_put_contents("kerdoivecontroller.log", "not".PHP_EOL, FILE_APPEND);
                $kerdes->correct_answer = "";
            }
            if($kerdes->correct_answer == null){
                $kerdes->correct_answer = "";
            }
            $kerdesek[] = $kerdes;
        }
        //$kerdoiv->kerdesek()->saveMany($kerdesek);
        foreach($kerdoiv->kerdesek as $dbkerdes) {
            if(!in_array($dbkerdes["id"], $megtartando_kerdes_id)){
                $dbkerdes->delete();
                file_put_contents("kerdoivecontroller.log", "torlendo kerdes id: ".strval($dbkerdes["id"]).PHP_EOL, FILE_APPEND);
                file_put_contents("kerdoivecontroller.log", "megtartando_kerdes_id: ". json_encode($megtartando_kerdes_id).PHP_EOL, FILE_APPEND);
                file_put_contents("kerdoivecontroller.log", "torlendo kerdes: ".strval($dbkerdes).PHP_EOL, FILE_APPEND);
            }
        }
        $kerdoiv->kerdesek()->saveMany($kerdesek);
        
        $kerdoiv->save();
        return response()->json($kerdoiv, 200);
    }

    public function delete(Kerdoiv $kerdoiv)
    {
        $kerdoiv->delete();

        return response()->json(null, 204);
    }
}
