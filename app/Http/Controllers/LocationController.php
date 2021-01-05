<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'image | required | mimes:jpg,png,jpeg,gif,svg | max: 2048 | dimensions:min_width=100,min_height=100',
            'country' => 'required | min: 4 | max: 255',
            'place' => 'required | min: 4 | max: 255',
            'price' => 'required | max: 5',
            'days' => 'required | max: 2',
            'nights' => 'required | max: 2',
            'package' => 'required',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->place . '.' . $extension;
            $file->move('uploads/locations/', $filename);
        
            if($validate){
                $location = new Location;
                $location->image = $filename;
                $location->country = $request->country;
                $location->place = $request->place;
                $location->price = $request->price;
                $location->days = $request->days;
                $location->nights = $request->nights;
                $location->description = $request->description;
                $location->package = $request->package;
                $location->status = $request->status;
                $location->editedBy = $request->editedBy;
                $location->save();
                $request->session()->flash('place', $location->place);
                return redirect()->route('allLocations');
            } 
        }
         
    }

    public function editLocationIndex($id){
        $location = Location::where('id', $id)->first();
        return view('editLocation', ['location'=>$location]);
    }

    public function editLocation($id, Request $request){
        $validate = $request->validate([
            'image' => 'image | required | mimes:jpg,png,jpeg,gif,svg | max: 2048 | dimensions:min_width=100,min_height=100',
            'country' => 'required | min: 4 | max: 255',
            'place' => 'required | min: 4 | max: 255',
            'price' => 'required | max: 5',
            'days' => 'required | max: 2',
            'nights' => 'required | max: 2',
            'package' => 'required',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = $request->place . '.' . $extension;
            $file->move('uploads/locations/', $filename);
        
            $sessionValue = $request->session()->get('user');
            if($sessionValue){
                if($validate){
                    Location::where('id', $id)
                            ->update(['image' => $filename,
                                    'country' => $request->country,
                                    'place' => $request->place,
                                    'price' => $request->price,
                                    'days' => $request->days,
                                    'nights' => $request->nights,
                                    'package' => $request->package,
                                    'status' => $request->status,
                                    'editedBy' => $sessionValue
                                    ]);
                    return redirect()->route('allLocations');
                }
            } else {
                echo "Session not found";
            }
        }
    }

    public function deleteLocationIndex($id){
        $location = Location::where('id', $id)->first();
        return view('deleteLocation', ['location'=>$location]);
    }
    
    public function deleteLocation($id){
        Location::where('id', $id)->delete();
        return redirect()->route('allLocations');
    }
}
