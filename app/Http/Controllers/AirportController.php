<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airport;

class AirportController extends Controller
{
    public function index()
    {
        $airports = Airport::all();
        return view('allAirports', ['airports' => $airports]);
    }

    public function addAirport(Request $request)
    {
        $validate = $request->validate([
            'country_name' => 'required | min: 4 | max: 255',
            'airport_name' => 'required | min: 4 | max: 255',
        ]);
            
        if($validate){
            $airport = new Airport;
            $airport->country_name = $request->country_name;
            $airport->airport_name = $request->airport_name;
            $airport->save();
            $request->session()->flash('airport_name', $airport->airport_name);
            return redirect()->route('allAirports');
        } 
    }

    public function editAirportIndex($id){
        $airport = Airport::where('id', $id)->first();
        return view('editAirport', ['airport'=>$airport]);
    }
    
    public function editAirport($id, Request $request){
        $validate = $request->validate([
            'country_name' => 'required | min: 4 | max: 255',
            'airport_name' => 'required | min: 4 | max: 255',
        ]);
        
       if($validate){
            Airport::where('id', $id)
                    ->update(['country_name' => $request->country_name,
                                'airport_name' => $request->airport_name,
                            ]);
            return redirect()->route('allAirports');
       }
    }

    public function deleteAirportIndex($id){
        $airport = Airport::where('id', $id)->first();
        return view('deleteAirport', ['airport'=>$airport]);
    }
    
    public function deleteAirport($id){
        Airport::where('id', $id)->delete();
        return redirect()->route('allAirports');
    }
}
