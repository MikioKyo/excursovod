<?php

namespace App\Http\Controllers;

use App\marker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CreateMarkerController extends Controller
{

    

    public function store(Request $request)
    {
        $marker = new marker;
        // $marker->name = $request->name;
        // $marker->lat  = $request->lat;
        // $marker->lng  = $request->lng;
        // $marker->pic  = $request->pic;
        // $marker->text = $request->text;
        // $marker->save();
        $marker = [
            'name' => $request->name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'pic' => $request->pic,
            'description' => $request->text,
            ];
        marker::create($marker);

        return response()->json($request);
    }

}
