<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Card;
use App\Builder;

class BuildersController extends Controller
{
    //
    public function cardCreate()
    {
        return view('admin.builders.cards.add');
    }

    public function cardStore(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $imagePath = $request->file('image')->store('cards', 'public');
        $thumbnailPath = $request->file('thumbnail')->store('card_thumbnails', 'public');

        Card::create([
            'image' => $imagePath,
            'thumbnail' => $thumbnailPath,
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('admin.card.create')->with('success', 'Card created successfully.');
    }

    public function buildersRequests()
    {
        if (!Gate::allows('property_manage') && !Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = [];
        $data['builders'] = Builder::with(['user'])->orderBy('id', 'DESC')->paginate(10);
        //    echo "<pre>"; print_r($data['builders']->toArray()); 
        //            exit;
        return view('admin.builders.builder.requests', compact('data'));
    }

    public function changestatus($id, $status)
    {
        $condition = [];
        switch ($status) {
            case 'approve':
                $condition['status'] = 'active';
                break;
            case 'activate':
                $condition['status'] = 'active';
                break;
            case 'deactivate':
                $condition['status'] = 'inactive';
                break;
            default:
                $condition['status'] = 'inactive';
                break;
        }
        if (count($condition) > 0) {
            Builder::where('id', $id)->update($condition);
        }
        return redirect()->back();
    }

    public function editrequest(Request $request, $id){
        if (!Gate::allows('property_manage') && !Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = []; 
    }
}
