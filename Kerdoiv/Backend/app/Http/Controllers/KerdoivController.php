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
	file_put_contents("kerdoivecontroller.log", "kerdoiv_store".PHP_EOL);
	file_put_contents("kerdoivecontroller.log", strval($request).PHP_EOL, FILE_APPEND);
	$k = new Kerdoiv;
	$k->title = $request->title;
	$k->is_separated = $request->is_separated;
	$k->is_randomised = $request->is_randomised;
	$ks = $request->kerdesek;
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
            $kerdes->correct_answer = $tk['correct_answer'];	
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
        $kerdoiv->update($request->all());

        return response()->json($kerdoiv, 200);
    }

    public function delete(Kerdoiv $kerdoiv)
    {
        $kerdoiv->delete();

        return response()->json(null, 204);
    }
}
