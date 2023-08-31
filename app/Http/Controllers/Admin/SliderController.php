<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropertySlider;
use App\Property;
use App\PropertySliderRelation;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = PropertySlider::paginate();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $slider = new PropertySlider();
        $slider->name = $request->input('name');
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slider = PropertySlider::findOrFail($id);
        return view('admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = PropertySlider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $slider = PropertySlider::findOrFail($id);
        $slider->name = $request->input('name');
        

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = PropertySlider::findOrFail($id);
        PropertySliderRelation::where('property_slider_id', $id)->delete();
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'slider deleted successfully.');
    }

    public function addPropertySlideRelation($propertySliderId)
    {
        $propertySlider = PropertySlider::findOrFail($propertySliderId);
        $selectedproperties = PropertySliderRelation::where('property_slider_id', $propertySliderId)->with(['property'])->get();

        return view('admin.sliders.propertySliders', compact('propertySlider', 'selectedproperties'));
    }

    public function filterProperties(Request $request, $propertySliderId)
    {
        $alreadySelected = PropertySliderRelation::where('property_slider_id', $propertySliderId)
            ->pluck('property_id')
            ->toArray();

        $query = $request->input('query');

        $properties = Property::where(function ($q) use ($query) {
            $q->where('id', 'LIKE', "$query%")
                ->orWhere('name', 'LIKE', "%$query%");
        })
            ->where('status', 1)
            ->whereNotIn('id', $alreadySelected)
            ->select('name', 'id')
            ->get()
            ->toArray();

        return response()->json($properties);
    }

    public function addPropertyToSlide(Request $request, $propertySliderId)
{
    try {
        $propertyId = $request->input('property_id');
        $propertySlider = PropertySlider::findOrFail($propertySliderId);
        $propertysliderelation = PropertySliderRelation::create([
            'property_id'=>$propertyId,
            'property_slider_id'=>$propertySliderId
        ]);
        // $propertySlider->properties()->attach($propertyId);

        return response()->json(['message' => 'Property added successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error adding property'], 500);
    }
}
 
public function deletepropertyslider($id){
    try {
        $slider = PropertySliderRelation::findOrFail($id);
       
        $slider->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
        // $propertySlider->properties()->attach($propertyId);

        return response()->json(['message' => 'Property added successfully']);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Error adding property'], 500);
    }
}
}
