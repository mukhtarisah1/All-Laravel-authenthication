<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CountryModel;
use Validator;

class CountryCountroller extends Controller
{
    public function getCountry(){
        return response()->json(CountryModel::get(), 200);
    }

    public function getCountryById($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["Message"=>"Error country record not found"], 404);
        }
        else{
        return response()->json($country, 200);
        }
    }

    public function countrySave(Request $request){
        $rules = [
            'name'=>'required|min:3',
            'iso'=> 'required|min:2|max:2',
            'dname'=>'unique',
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
            return response()->json(["Message"=>"Error country record not found"], 404);
        }
        else{
            return response()->json($country, 200);
        }
    }


    public function countryDelete(Request $request, $id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["Message"=>"Error country record not found"], 404);
        }else{
            $country->delete();
            return response()->json('Contry Deleted');
        }
    }

    }


