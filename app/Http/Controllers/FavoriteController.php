<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function store($id){
        $favori = Auth::user()->favorites()->create(['itineraries_id' => $id]);
    }
}
