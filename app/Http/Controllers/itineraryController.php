<?php

namespace App\Http\Controllers;

use App\Models\itinerary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'destinationslist' => 'required',
        ]);

        return itinerary::create([
            'title' => $request->title,
            'categorie' => $request->categorie,
            'duration' => $request->duration,
            'image' => $request->image,
            'destinationslist' => $request->destinationslist,
            'user_id' => Auth::id(),
        ]);
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
