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

    protected function validator(array $request)
    {
        return Validator::make($request, [
            'name' => 'required|string|max:50',
            'description' => 'required|string|max:255'
        ]);
    }
}
