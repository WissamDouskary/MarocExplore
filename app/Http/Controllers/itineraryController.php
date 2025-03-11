<?php

namespace App\Http\Controllers;

use App\Models\itinerary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class itineraryController extends Controller
{
    public function index()
    {
        return DB::table('itineraries')->select('*')->get();
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|max:20|min:5',
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

    public function show($id)
    {
        return DB::table('itineraries')->where('id', $id)->get();
    }

    public function update(Request $request, $id)
    {
        $itinerary = Itinerary::find($id);

        if (!$itinerary) {
            return response([
                'message' => "Itinerary not found!",
            ], 404);
        }

        if (Auth::id() != $itinerary->user_id) {
            return response([
                'message' => "Can't edit itineraries!",
            ], 401);
        }

        $validated = $request->validate([
            'title' => 'max:20|min:5',
        ]);

        $itinerary->update($validated);
        return $itinerary;
    }

    public function destroy($id)
    {
        return DB::table('itineraries')->where('id', $id)->delete();
    }

    public function search($title)
    {
        return DB::table('itineraries')->where('title', 'LIKE', '%' . $title . '%')->get();
    }
}
