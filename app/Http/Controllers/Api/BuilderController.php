<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Builder;

class BuilderController extends Controller
{
    //
    public function getBuilder($slug)
    {
        $data = [];
        $data['builder'] = Builder::where('slug', $slug)->with(['details', 'cards' => function ($card) {
            $card->with(['card','city','builder','builderCardProperty'=>function($property){
                $property->with(['property'=>function($bproperty){
                    $bproperty->with(['property_details'=>function($dproperty){
                        $dproperty->with(['city']);
                    }, 'property_type.type_data','images'=>function($img){
                        $img->where('featured',1);
                    }, 'amenities' => function ($aquery) {
                        $aquery->with(['amenity_data']);
                        $aquery->limit(2); // Limiting the number of amenities to 2
                    }]);
                }]);
            }]);
        }])->first();
        if($data['builder']){
            return response()->json(['code' => '101', 'msg' => $data, 'status' => true]);
        }else{
            return response()->json(['code' => '404', 'status' => false]);
        }
       
    }
}
