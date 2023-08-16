<?php

namespace App\Http\Controllers\FrontUser;

use App\User;
use App\Leads;
use App\Vastu;
use App\Images;
use App\Amenity;
use App\Property;
use Carbon\Carbon;
use App\Preferences;
use App\PropertyType;
use App\AssignedTypes;
use App\AssignedVastu;
use App\commonfunction;
use App\Propertydetail;
use App\Likes;
use App\States;
use App\Cities;
use App\PlanTypes;
use App\AssignedAmenities;
use App\AssignedPreferences;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;
use App\Traits\CommonTrait;

class PropertiesController extends Controller
{
    use CommonTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function profile()
    {
        $data = User::where('id', Auth::user()->id)->first();
        return view('userdashboard.profile', compact('data'));
    }
    public function handp()
    {
        // $data = User::where('id',Auth::user()->id)->first();
        return view('userdashboard.handp');
    }
    public function faq()
    {
        // $data = User::where('id',Auth::user()->id)->first();
        return view('userdashboard.faq');
    }

    public function index()
    {
        // $currentuserid = Auth::guard('frontuser')->user()->id;
        // $property = Property::where('user_id', $currentuserid)->with(['property_type.type_data', 'property_details', 'images'])->get();
        // $properties = $property;
        // // echo "<pre>"; print_r($properties->toArray()); echo "<pre>";
        // // exit;
        // //print '<pre>'; print_r($properties); die;
        // return view('userdashboard.property.index', compact('properties'));


        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['states'] = States::where('country_id', 101)->get();
            $data['properties'] = Property::where('user_id', $userId)
                ->with(['property_details', 'userSubscriptions' => function ($query) {
                    $query->where('start_at', '<=', now())
                        ->where('end_at', '>=', now())
                        ->with(['plan' => function ($pquery) {
                            $pquery->with(['planType']);
                        }]);
                }])
                ->orderBy('id', 'desc')
                ->paginate(10);
            $data['plans'] = PlanTypes::where('status', 'active')
                ->with(['subscriptonPlans' => function ($query) {
                    $query->where('status', 'active');
                }])->get();
            // echo "<pre>"; print_r($data['properties']->toArray()); echo "<pre>";
            //     exit;
            // return view('userdashboard.property.create', compact('data'));
            return view('dashboard.listproperty', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            //$data['property_type'] = PropertyType::get();
            $data['vastu'] = Vastu::get();
            $data['amenity'] = Amenity::get();
            $data['preferences'] = Preferences::get();

            $data['property_type_commercial'] = PropertyType::where('property_type', 'commercial')->get();
            $data['property_type_residential'] = PropertyType::where('property_type', 'residential')->get();
            $data['states'] = States::where('country_id', 101)->get();
//  echo "<pre>"; print_r($data['property_type_commercial']->toArray()); echo "</pre>";
//  echo "<pre>"; print_r($data['property_type_residential']->toArray()); echo "</pre>";
//         exit;
            // return view('userdashboard.property.create', compact('data'));
            return view('dashboard.addproperty', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        //  echo "<pre>"; print_r($data); echo "</pre>";
        // exit;
        $user_id = Auth::guard('frontuser')->user()->id;
        //print $user_id; die;
        $slug = commonfunction::createSlug(Str::slug($data['name']), 0, 'property');
        $property = Property::create([
            'name' => $data['name'],
            'user_id' => $user_id,
            'description' => isset($data['description']) ? $data['description'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'location' => isset($data['location']) ? $data['location'] : '',
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'type' => $data['type'],
            'status' => 1,
            'featured' => isset($data['featured']) ? 1 : 0,
            'hot' => isset($data['hot']) ? 1 : 0,
            // 'contact_number' => $data['contact_number'],
            //'notes' => $data['notes'],
            'slug' => $slug,
            'created_by' => $user_id

        ]);

        $property_id = $property->id;

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads/image/property' . $property_id . '/';
            $file->move($path, $filename);
            $url = url('/uploads/image/property' . $property_id . '/' . $filename);
            $image = Images::create([
                'property_id' => $property_id,
                'name' => $filename,
                'url' => $url,
                'featured' => 1
            ]);
            $image_id = $image->id;
        }
        // if( $files = $request->file('image')){
        //     // dd($files);
        //     foreach($files as $file){
        //         $filename = $file->getClientOriginalName();
        //         $path = public_path() . '/uploads/image/property' .$property_id . '/';
        //         $file->move($path, $filename);
        //         $url = url('/uploads/image/property' .$property_id . '/' . $filename);
        //         $image = Images::create([
        //             'property_id' => $property_id,
        //             'name' => $filename,
        //             'url' => $url,
        //             'featured' => 0
        //         ]);
        //         $image_id = $image->id;
        //     }
        // }
        // foreach($request->image as $i){
        //     $file = $i->file('image');
        //     $filename = $file->getClientOriginalName();
        //     $path = public_path() . '/uploads/image/property' .$property_id . '/';
        //     $file->move($path, $filename);
        //     $url = url('/uploads/image/property' .$property_id . '/' . $filename);
        //     $image = Images::create([
        //         'property_id' => $property_id,
        //         'name' => $filename,
        //         'url' => $url,
        //         'featured' => 0
        //     ]);
        //     $image_id = $image->id;
        // }
        ///Vastu///
        $vastu = isset($data['vastu']) ? $data['vastu'] : "";
        if ($vastu != "") {
            $assign_vastu = AssignedVastu::create([
                'vastu_id' => $vastu,
                'property_id' => $property_id
            ]);
        }
        ///property type
        $property_type = $data['property_type'];
        if ($property_type != '') {
            $assign_type = AssignedTypes::create([
                'type_id' => $property_type,
                'property_id' => $property_id
            ]);
        }
        ////Amenities

        if (isset($data['amenities'])) {
            $amenities = $data['amenities'];
            if (gettype($amenities) == 'array') {
                $insert_ammenity = [];
                if (count($amenities) > 0) {
                    foreach ($amenities as $value) {
                        $values = [];
                        $values['amenity_id'] = $value;
                        $values['property_id'] = $property_id;
                        $values["created_at"] = Carbon::now();
                        $values["updated_at"] = now();
                        array_push($insert_ammenity, $values);
                    }
                    AssignedAmenities::insert($insert_ammenity);
                }
            }
        }
        ///Additional
        //$additional =  isset($data['additional']) ?  json_decode($data['additional']) : [];
        $additional =  isset($data['additional']) ?  $data['additional'] : [];
        if (gettype($additional) == 'array') {
            $insert_additional = [];
            if (count($additional) > 0) {
                foreach ($additional as $value) {
                    $values = [];
                    $values['preference_id'] = $value;
                    $values['property_id'] = $property_id;
                    $values["created_at"] = Carbon::now();
                    $values["updated_at"] = now();
                    array_push($insert_additional, $values);
                }
                AssignedPreferences::insert($insert_additional);
            }
        }
        $extraNotes = isset($data['extra_notes']) ? $data['extra_notes'] : '';

        $property_details = Propertydetail::create([
            'property_id' => $property_id,
            'user_type' => $data['user_type'], 
            'property_category' => $data['property_category'],
            'property_title' => $data['property_title'],
            'locality' => $data['locality'],
            'rera_number' => $data['rera_number'],
            'property_feature' => isset($data['property_feature']) ? $data['property_feature'] : null,
            'property_status' => isset($data['property_status']) ? $data['property_status'] : null,
            'property_age'  => isset($data['property_age']) ? $data['property_age'] : null,
            'possesion_by'  => isset($data['possesion_by']) ? $data['possesion_by'] : null,
            'state_id'  => isset($data['state_id']) ? $data['state_id'] : null,
            'city_id'  => isset($data['city_id']) ? $data['city_id'] : null,
            //'bedroom' => $data['bedroom'],
            //'bathroom' => $data['bathroom'],
            //'balcony' => $data['balcony'],
            //'kitchen' => $data['kitchen'],
            //'living_room' => $data['living_room'],
            'furnished' => isset($data['furnished']) ? $data['furnished'] : null,
            'preference' => isset($data['preference']) ? $data['preference'] : '',
            'carpet_area' => isset($data['carpet_area']) ? $data['carpet_area'] : null,
            'super_area' => isset($data['super_area']) ? $data['super_area'] : null,
            'build_up_area' => isset($data['build_up_area']) ? $data['build_up_area'] : null,
            'price' => $data['price'],
            //'currency' => $data['currency'],
            'govt_tax_include' =>isset($data['govt_tax_include']) ? $data['govt_tax_include'] : null,
            'extra_notes' => $extraNotes
        ]);

        return redirect()->route('frontuser.property.addimages', ['slug' => $slug]);

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $data = [];
        $data['property'] = Property::where('id', $id)->withCount('likes')->with(['amenities.amenity_data', 'vastu.vastu_data', 'preferences.preferences_data', 'property_type.type_data', 'property_details', 'images'])->first();
        return view('userdashboard.property.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //



        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            //$data['property_type'] = PropertyType::get();

            $data['property'] = Property::where('id', $id)->with(['amenities', 'vastu.vastu_data', 'preferences', 'property_type.type_data', 'property_details', 'images' => function ($query) {
                $query->where('featured', 1)->first();
            }])->first();
            if ($userId != $data['property']->user_id) {
                return redirect()->route('frontuser.property.index');
            } else {
                $data['vastu'] = Vastu::get();
                $data['amenity'] = Amenity::get();
                $data['preferences'] = Preferences::get();
                $data['property_type_commercial'] = PropertyType::where('property_type', 'commercial')->get();
                $data['property_type_residential'] = PropertyType::where('property_type', 'residential')->get();
                $data['amenityIds'] = $data['property']->amenities->pluck('amenity_id')->toArray();
                $data['preferencesIds'] = $data['property']->preferences->pluck('preference_id')->toArray();
                $data['states'] = States::where('country_id', 101)->get();
                $data['cities'] =[];
                if($data['property']->property_details->state_id){
                    $stateId=$data['property']->property_details->state_id;
                    $data['cities'] = Cities::where('state_id', $stateId)->get();
                }
                $data['possessionByOptions'] = [
                    '2023', '2024', '2025', '2026', '2027', '2028' // Add more options as needed
                ];
                //                 echo "<pre>"; print_r($data['property']->toArray());
                // exit;
                //return view('userdashboard.property.edit', compact('data'));
                return view('dashboard.editproperty', compact('data'));
            }
        } else {
            return redirect()->route('home.index');
        }
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

        //
        $data = $request->all();
        // echo "<pre>"; print_r($data);
        // exit;

        $user_id = Auth::user()->id;

        $update_property = [
            'name' => $data['name'],
            'user_id' => $user_id,
            'description' => isset($data['description']) ? $data['description'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'location' => isset($data['location']) ? $data['location'] : '',
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'type' => $data['type'],
            'status' => 1,
            'featured' => isset($data['featured']) ? 1 : 0,
            'hot' => isset($data['hot']) ? 1 : 0,
            //'notes' => $data['notes'],
            'slug' => commonfunction::createSlug(Str::slug($data['name']), 0, 'property'),
            'created_by' => $user_id
        ];
        Property::where('id', $id)
            ->update($update_property);

        ///banner Image///
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads/image/property' . $id . '/';
            $file->move($path, $filename);
            $url = url('/uploads/image/property' . $id . '/' . $filename);
            Images::where('property_id', $id)->where('featured', 1)->delete();
            $image = Images::create([
                'property_id' => $id,
                'name' => $filename,
                'url' => $url,
                'featured' => 1
            ]);

            $image_id = $image->id;
        }

        ///Vastu///
        $vastu = isset($data['vastu']) ? $data['vastu'] : "";
        $assigned_vastu = AssignedVastu::where('property_id', $id)->delete();
        if ($vastu != "") {
            $assign_vastu = AssignedVastu::create([
                'vastu_id' => $vastu,
                'property_id' => $id
            ]);
        }
        ///property type
        $property_type = isset($data['property_type'])? $data['property_type'] : '';
        $assigned_types = AssignedTypes::where('property_id', $id)->delete();
        if ($property_type != '') {
            $assign_type = AssignedTypes::create([
                'type_id' => $property_type,
                'property_id' => $id
            ]);
        }
        ////Amenities
        $amenities = isset($data['amenities']) ? $data['amenities']: [];
        $assigned_amenities = AssignedAmenities::where('property_id', $id)->delete();
        if (gettype($amenities) == 'array') {
            $insert_ammenity = [];
            if (count($amenities) > 0) {
                foreach ($amenities as $value) {
                    $values = [];
                    $values['amenity_id'] = $value;
                    $values['property_id'] = $id;
                    $values["created_at"] = Carbon::now();
                    $values["updated_at"] = now();
                    array_push($insert_ammenity, $values);
                }
                AssignedAmenities::insert($insert_ammenity);
            }
        }
        ///Additional
        $additional =  isset($data['additional']) ? $data['additional'] : [];
        $assigned_additional = AssignedPreferences::where('property_id', $id)->delete();
        if (gettype($additional) == 'array') {
            $insert_additional = [];
            if (count($additional) > 0) {
                foreach ($additional as $value) {
                    $values = [];
                    $values['preference_id'] = $value;
                    $values['property_id'] = $id;
                    $values["created_at"] = Carbon::now();
                    $values["updated_at"] = now();
                    array_push($insert_additional, $values);
                }
                AssignedPreferences::insert($insert_additional);
            }
        }

        $extraNotes = isset($data['extra_notes']) ? $data['extra_notes'] : '';

        $update_details = [
            'user_type' => $data['user_type'], 
            'property_category' => $data['property_category'],
            'property_title' => $data['property_title'],
            'locality' => $data['locality'],
            'rera_number' => $data['rera_number'],
            'property_feature' => isset($data['property_feature']) ? $data['property_feature'] : null,
            'property_status' => isset($data['property_status']) ? $data['property_status'] : null,
            'property_age'  => isset($data['property_age']) ? $data['property_age'] : null,
            'possesion_by'  => isset($data['possesion_by']) ? $data['possesion_by'] : null,
            'state_id'  => isset($data['state_id']) ? $data['state_id'] : null,
            'city_id'  => isset($data['city_id']) ? $data['city_id'] : null,
            //'bedroom' => $data['bedroom'],
            //'bathroom' => $data['bathroom'],
            //'balcony' => $data['balcony'],
            //'kitchen' => $data['kitchen'],
            //'living_room' => $data['living_room'],
            'furnished' => isset($data['furnished']) ? $data['furnished'] : null,
            'preference' => isset($data['preference']) ? $data['preference'] : '',
            'carpet_area' => isset($data['carpet_area']) ? $data['carpet_area'] : null,
            'super_area' => isset($data['super_area']) ? $data['super_area'] : null,
            'build_up_area' => isset($data['build_up_area']) ? $data['build_up_area'] : null,
            'price' => $data['price'],
            //'currency' => $data['currency'],
            'govt_tax_include' =>isset($data['govt_tax_include']) ? $data['govt_tax_include'] : null,
            'extra_notes' => $extraNotes
        ];
        Propertydetail::updateOrCreate(
            ['property_id' => $id], // Identification criteria (e.g., primary key)
            $update_details // Data to update or create
        );


        return redirect()->route('frontuser.property.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // if (!Gate::allows('users_manage')) {
        //     return abort(401);
        // }
        print 'a';
        die;
        $property = Property::findOrFail($id);
        $property->delete();

        return redirect()->route('frontuser.property.index');
    }

    public function image($id)
    {
        $data['images'] = Images::where('property_id', $id)->get();
        $data['property_id'] = $id;
        return view('userdashboard.property.image', compact('data'));
        // exit;
    }
    public function addimage(Request $request)
    {
        // Validate the request data
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'property_id' => 'required|numeric',
        ]);

        // Get the input data
        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $path = public_path() . '/uploads/image/property' . $data['property_id'] . '/';
            $file->move($path, $filename);
            $url = url('/uploads/image/property' . $data['property_id'] . '/' . $filename);

            $image = Images::create([
                'property_id' => $data['property_id'],
                'name' => $filename,
                'url' => $url,
                'featured' => 0
            ]);

            $image_id = $image->id;

            // Return the image ID or any other response as needed
            return response()->json(['image_id' => $image_id, 'url' => $url], 200);
        }

        // Return an error response if the image file was not found
        return response()->json(['message' => 'Image file not found.'], 400);
    }
    public function addImages($slug)
    {
        if (Auth::check()) {
            $property =  Property::where('slug', $slug)->with(['images'=>function($query){
                $query->where('featured',0);
            }])->first();
            if ($property) {
                $userId = Auth::user()->id;
                if ($userId != $property->user_id) {
                    return redirect()->route('frontuser.property.index');
                } else {
                    $data['user'] = $this->getUserDetailsById($userId);
                    $data['p_count'] = $this->getUserPropertyCount($userId);
                    $data['property'] = $property;
                    ////WORK HERE
                    //             echo "<pre>"; print_r($property->toArray()); echo "<pre>";
                    // exit;
                    return view('dashboard.addimages', compact('data'));
                }
            } else {
                return redirect()->route('frontuser.property.index');
            }
        } else {
            return redirect()->route('home.index');
        }
    }
    public function deleteimage($id)
    {
        try {
        $image = Images::findOrFail($id);

        // Get the image file path
        $imagePath = public_path('uploads/image/property'.$image->property_id.'/'.$image->name);
    
        // Check if the image file exists
        if (File::exists($imagePath)) {
            // If the image file exists, unlink it from the server
            File::delete($imagePath);
        }
    
        // Delete the image record from the database
        $image->delete();
    

        return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to delete image']);
    }
    }
    public function leads($slug)
    {
        if (Auth::check()) {
            $property =  Property::where('slug', $slug)->first();
            if ($property) {
                $userId = Auth::user()->id;
                if ($userId != $property->user_id) {
                    return redirect()->route('frontuser.property.index');
                } else {
                    $data['user'] = $this->getUserDetailsById($userId);
                    $data['p_count'] = $this->getUserPropertyCount($userId);
                    $data['property'] = $property;
                    $data['leads'] = Leads::where('property_id', $property->id)->with(['property' => function ($query) {
                        $query->with(['property_details']);
                    }, 'subplan' => function ($query) {
                        $query->with(['planType']);
                    }])->paginate();
                    ////WORK HERE
                    //             echo "<pre>"; print_r($data['leads']->toArray()); echo "<pre>";
                    // exit;
                    return view('dashboard.leads', compact('data'));
                }
            } else {
                return redirect()->route('frontuser.property.index');
            }
        } else {
            return redirect()->route('home.index');
        }
    }

    public function wishlist(){
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['wishlist'] = Likes::where('user_id', $userId)->wherehas('property')->with(['property'=>function($query){
                $query->with(['property_details', 'images'=>function($inmgQuery){
                    $inmgQuery->where('featured',1);
                }]);  
            }])->paginate();
                    //          echo "<pre>"; print_r($data['wishlist']->toArray()); echo "<pre>";
                    // exit;
            return view('dashboard.wishlist', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }
}
