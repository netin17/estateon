<?php

namespace App\Http\Controllers\Admin;

use App\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        $amenities = Amenity::all();

        return view('admin.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        return view('admin.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,svg',
        ]);
        $amenity = new Amenity();
        $amenity->name = $request->input('name');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('amenity_images', 'public');
            $amenity->image = $imagePath;
        }

        $amenity->save();

        return redirect()->route('admin.amenity.index')->with('success', 'Amenity created successfully.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function show(Amenity $amenity)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }

        return view('admin.amenities.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function edit(Amenity $amenity)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
       // $ability = Ability::findOrFail($id);

        return view('admin.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $request->validate([
            'name' => 'required|string',
            'image' => 'image|mimes:jpeg,png,svg',
        ]);
    
        $amenity = Amenity::findOrFail($id);
        $amenity->name = $request->input('name');
    
        // Handle image upload only if "change image" checkbox is checked
        if ($request->hasFile('image') && $request->has('change_image')) {
            // Delete the old image
            if ($amenity->image) {
                Storage::disk('public')->delete($amenity->image);
            }
    
            $imagePath = $request->file('image')->store('amenity_images', 'public');
            $amenity->image = $imagePath;
        }
    
        $amenity->save();

        return redirect()->route('admin.amenity.index')->with('success', 'Amenity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amenity  $amenity
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        $amenity = Amenity::findOrFail($id);

        // Delete the image if it exists
        if ($amenity->image) {
            Storage::disk('public')->delete($amenity->image);
        }
    
        $amenity->delete();

        return redirect()->route('admin.amenity.index')->with('success', 'Amenity deleted successfully.');
    }

    public function massDestroy(Request $request)
    {
        if (! Gate::allows('users_manage')) {
            return abort(401);
        }
        Amenity::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
