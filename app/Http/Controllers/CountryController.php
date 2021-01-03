<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('allCountries', ['countries' => $countries]);
    }

    public function addAirport(Request $request)
    {
        
        $validate = $request->validate([
            'country_name' => 'required | min: 4 | max: 255',
            'airport_name' => 'required | min: 4 | max: 255',
        ]);
            
        if($validate){
            $country = new Country;
            $country->country_name = $request->country_name;
            $country->airport_name = $request->airport_name;
            $country->save();
            $request->session()->flash('airport_name', $country->airport_name);
            return redirect()->route('allCountries');
        } 
    }

    public function editAirportIndex($id){
        $country = Country::where('id', $id)->first();
        return view('editAirport', ['country'=>$country]);
    }
    
    public function editAirport($id, Request $request){
        $validate = $request->validate([
            'country_name' => 'required | min: 4 | max: 255',
            'airport_name' => 'required | min: 4 | max: 255',
        ]);
        
       if($validate){
            Country::where('id', $id)
                    ->update(['country_name' => $request->country_name,
                                'airport_name' => $request->airport_name,
                            ]);
            return redirect()->route('allCountries');
       }
    }

    public function deleteAirportIndex($id){
        $country = Country::where('id', $id)->first();
        return view('deleteAirport', ['country'=>$country]);
    }
    
    public function deleteAirport($id){
        Country::where('id', $id)->delete();
        return redirect()->route('allCountries');
    }
}
