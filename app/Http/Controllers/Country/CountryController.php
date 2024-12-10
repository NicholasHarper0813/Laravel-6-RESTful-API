<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(), 200);
    }

    public function countryByID($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"], 404);
        }
        return response()->json($country, 200);
    }

    public function countrySave(Request $request){
        $rules = [
            'iso' => 'required|min:3',
            'name' => 'required|min:2|max:2',
            'dname' => 'required|min:3',
            'iso3' => 'required|min:2',
            'position' => 'required|min:1',
            'numcode' => 'required|min:3',
            'phonecode' => 'required|min:3',
            'created' => 'required|min:10',
            'register_by' => 'required|min:1',
            'modified' => 'required|min:10',
            'modified_by' => 'required|min:1',
        ];
        
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        $country = CountryModel::create($request->all());
        return response()->json($country, 201);
    }

    public function countryUpdate(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"], 404);
        }
        
        $country->update($request->all());
        return response()->json($country, 200);
    }

    public function countryDelete(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message" => "Record not found!"], 404);
        }
        
        $country->delete();
        return response()->json(null, 204);
    }
}
