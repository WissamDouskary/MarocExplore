<?php

namespace App\Http\Controllers;

use App\Models\itinerary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class itineraryController extends Controller
{
    public function index(){
        return DB::table('itineraries')->select('*')->get();
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'categorie' => 'required',
            'duration' => 'required',
            'image' => 'required',
            'destinations-list' => 'required',
        ]);

        return itinerary::create($request->all());
    }

    public function show($id){
        return DB::table('itineraries')->where('id', $id)->get();
    }

    public function update(Request $request, $id){
        $itinerary = DB::table('itineraries')->where('id', $id)->get();
        $itinerary->update($request->all());
        return $itinerary;
    }

    public function destroy($id){
        return DB::table('itineraries')->where('id', $id)->delete();
    }

    public function search($title){
        return DB::table('itineraries')->where('title', 'LIKE', '%'.$title.'%')->get();
    }
}
