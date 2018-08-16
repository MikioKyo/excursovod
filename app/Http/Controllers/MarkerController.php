<?php

namespace App\Http\Controllers;

use App\marker;
use Illuminate\Http\Request;

class MarkerController extends Controller
{
    public function index() {
        $markers = marker::all();
        return response()->json([
            'markers' => $markers,
            'state' => 'CA'
        ]);
    }

    public function excursions() {
        $markers = marker::all();
        return view('myexcursions')->withmarkers($markers);
    }
}
