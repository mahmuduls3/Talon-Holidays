<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('allLocations', ['locations' => $locations]);
    }

    public function addLocation(Request $request)
    {
        $validate = $request->validate([
            'country' => 'required | min: 4 | max: 255',
            'place' => 'required | min: 5 | max: 255',
            'price' => 'required | max: 5',
            'days' => 'required | max: 2',
            'nights' => 'required | max: 2',
        ]);

        if($validate){
            $location = new Location;
            $location->country = $request->country;
            $location->place = $request->place;
            $location->price = $request->price;
            $location->days = $request->days;
            $location->nights = $request->nights;
            $location->description = $request->description;
            $location->editedBy = $request->editedBy;
            $location->save();
            return redirect()->route('allLocations');
        } 
    }
}
