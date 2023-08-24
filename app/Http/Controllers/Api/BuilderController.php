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
            $card->with(['card','city','builderCardProperty']);
        }])->first();
        return response()->json(['code' => '101', 'msg' => $data, 'status' => true]);
    }
}
