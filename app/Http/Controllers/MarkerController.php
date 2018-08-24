<?php

namespace App\Http\Controllers;

use App\marker;
use Illuminate\Http\Request;
use App\excursion;
use App\User;

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
        $excursions = excursion::all();
        $users = User::all();
        return view("myexcursions", ["excursions"=>$excursions], ["users"=>$users]);
    }
}
