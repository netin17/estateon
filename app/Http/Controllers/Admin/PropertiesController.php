<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use App\PropertyType;
use App\Vastu;
use App\Amenity;
use App\Preferences;
use App\Propertydetail;
use App\AssignedVastu;
use App\AssignedAmenities;
use App\AssignedPreferences;
use App\AssignedTypes;
use App\Images;
use App\Likes;
use App\States;
use App\Cities;
use App\commonfunction;
use App\Leads;
use App\User;
use App\UserSubscription;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\Null_;
use App\Http\Requests\Admin\UpdatepropertyRequest;
use Illuminate\Support\Str;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $filter = [];
        $filtertype=[];
        $property_type=[];
        $filter_all = isset($_GET['q']) ? $_GET['q'] : '';

        $property = Property::with(['amenities.amenity_data',
         'vastu.vastu_data',
          'preferences.preferences_data',
           'property_type.type_data',
            'property_details',
            'userSubscriptions'=>function($query){
                $query->where('start_at', '<=', now())
                ->where('end_at', '>=', now())
                ->with(['plan' => function ($pquery) {
                    $pquery->with(['planType']);
                }]);
            }
        ]);
        if ($filter_all != '') {
            $property->where('name', 'LIKE', '%' . $filter_all . '%')
            ->orWhere('id', 'LIKE', '%' . $filter_all . '%');
            $filter['q'] = $filter_all;
        }
        $property->orderBy('id', 'desc');
        $properties = $property->paginate(10);

        foreach($properties as $index=>$property){
            $properties[$index]->posted_by = Self::getUserPostedBy($property->created_by);
            
        }
        

        // echo "<pre>"; print_r($properties->toArray()); echo "<pre>";
        // exit;
        return view('admin.property.index', compact('properties', 'filter','property_type' ));
    }

    
    public function getUserPostedBy($userID)
    {
        $user = User::where('id',$userID)->first();
        //print '<pre>'; print_r($user); die;
        if($user != null){
            if($user->user_level == 1){
                return 'Admin';
            }
            if($user->user_level == 2){
                return 'Sub admin';
            }
            if($user->user_level == 0){
                return 'User';
            }
            //return $user->user_level;
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = [];
        //$data['property_type'] = PropertyType::get();
        $data['vastu'] = Vastu::get();
        $data['amenity'] = Amenity::get();
        $data['preferences'] = Preferences::get();

        $data['property_type_commercial'] = PropertyType::where('property_type','commercial')->get();
        $data['property_type_residential'] = PropertyType::where('property_type','residential')->get();
        $data['states'] = States::where('country_id', 101)->get();
        //print '<pre>'; print_r($data['property_type_residential']); die;
        return view('admin.property.create', compact('data'));
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
        $data = $request->all();
        //  echo "<pre>"; print_r($data); echo "</pre>";
        // exit;
        $user_id = Auth::user()->id;
        //print $user_id; die;
        $property = Property::create([
            'name' => $data['name'],
            'user_id' => $data['user_id'],
            //'posted' => $data['Posted_by'],
            'description' => isset($data['description']) ? $data['description'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'location' => isset($data['location']) ? $data['location'] : '',
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'type' => $data['type'],
            // 'contact_number' => $data['contact_number'],
            'status' => 1,
            'featured' => isset($data['featured']) ? 1 : 0,
            'hot' => isset($data['hot']) ? 1 : 0,
            //'notes' => $data['notes'],
            'slug'=> commonfunction::createSlug(Str::slug($data['property_title']),0,'property'),
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
        ///Vastu///
        $vastu = isset($data['vastu']) ? $data['vastu'] : "";
        if ($vastu != "") {
            $assign_vastu = AssignedVastu::create([
                'vastu_id' => $vastu,
                'property_id' => $property_id
            ]);
        }
        ///property type
        $property_type = $data['property_category']=='commercial'? $data['property_type_commercial']:$data['property_type_residential'];
        if ($property_type != '') {
            $assign_type = AssignedTypes::create([
                'type_id' => $property_type,
                'property_id' => $property_id
            ]);
        }
        ////Amenities
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
        ///Additional
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

        ////property details
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

        if(Auth::user()->user_level == 1){
            return redirect()->route('admin.property.index');
        }else if(Auth::user()->user_level == 2){
            return redirect()->route('adminuser.property.index');
        }else {
            return redirect()->route('userproperties.index');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $data = [];
        $data['property'] = Property::where('id', $id)->withCount('likes')->with(['amenities.amenity_data', 'vastu.vastu_data', 'preferences.preferences_data', 'property_type.type_data', 'property_details'])->first();
        return view('admin.property.show', compact('data'));
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
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = [];
        //$data['property_type'] = PropertyType::get();
        $data['vastu'] = Vastu::get();
        $data['amenity'] = Amenity::get();
        $data['preferences'] = Preferences::get();
        $data['property'] = Property::where('id', $id)->with(['amenities.amenity_data', 'vastu.vastu_data', 'preferences.preferences_data', 'property_type.type_data', 'property_details','images' => function ($query) {
            $query->where('featured', 1)->first();
        }])->first();
        //  echo "<pre>"; print_r($data['property']->toArray() );
        // exit;
        $data['property_type_commercial'] = PropertyType::where('property_type','commercial')->get();
        $data['property_type_residential'] = PropertyType::where('property_type','residential')->get();
        $data['states'] = States::where('country_id', 101)->get();
        $data['cities'] =[];
        if($data['property']->property_details->state_id){
            $stateId=$data['property']->property_details->state_id;
            $data['cities'] = Cities::where('state_id', $stateId)->get();
        }
        $data['possessionByOptions'] = [
            '2023', '2024', '2025', '2026', '2027', '2028' // Add more options as needed
        ];
        return view('admin.property.edit', compact('data'));
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
            'user_id' => $data['user_id'],
            'description' => isset($data['description']) ? $data['description'] : '',
            'address' => isset($data['address']) ? $data['address'] : '',
            'location' => isset($data['location']) ? $data['location'] : '',
            'lat' => $data['lat'],
            'lng' => $data['lng'],
            'type' => $data['type'],
            // 'contact_number' => $data['contact_number'],
            'status' => 1,
            'featured' => isset($data['featured']) ? 1 : 0,
            'hot' => isset($data['hot']) ? 1 : 0,
            //'notes' => $data['notes'],
            'slug'=> commonfunction::createSlug(Str::slug($data['property_title']),0,'property'),
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

            $image = Images::where('property_id', $id)->where('featured', 1)->first();
            if ($image) {
            // Get the image file path
            $imagePath = public_path('uploads/image/property'.$image->property_id.'/'.$image->name);
        
            // Check if the image file exists
            if (File::exists($imagePath)) {
                // If the image file exists, unlink it from the server
                File::delete($imagePath);
            }
        
            // Delete the image record from the database
            $image->delete();

        }
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
        $property_type = $data['property_category']=='commercial'? $data['property_type_commercial']:$data['property_type_residential'];
        $assigned_types = AssignedTypes::where('property_id', $id)->delete();
        if ($property_type != '') {
            $assign_type = AssignedTypes::create([
                'type_id' => $property_type,
                'property_id' => $id
            ]);
        }
        ////Amenities
        $amenities = $data['amenities'];
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
        Propertydetail::where('property_id', $id)
            ->update($update_details);

            if(Auth::user()->user_level == 1){
                return redirect()->route('admin.property.index');
            }else if(Auth::user()->user_level == 2){
                return redirect()->route('adminuser.property.index');
            }else {
                return redirect()->route('userproperties.index');
            }
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
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $property = Property::findOrFail($id);
        $activesubscription=UserSubscription::where('property_id', $property->id)->where('status', 1)->first();
        if($activesubscription){
            return back()->withErrors(['active_sub' => 'Cannot delete property. It has active Subscription']);
        }
        $property->delete();

        return redirect()->route('admin.property.index');
    }

    public function image($id)
    {
        $data['images'] = Images::where('property_id', $id)->where('featured', 0)->get();
        $data['property_id'] = $id;
        return view('admin.property.image', compact('data'));
        // exit;
    }
    public function addimage(Request $request)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

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
        }
        return redirect()->route('admin.property.image', $data['property_id']);
    }
    
public function deleteimage($id)
{
    // Check if the user has the required permission
    if (!Gate::allows('users_manage')) {
        return abort(401);
    }

    // Find the image record in the database
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

    // Redirect back to the property images page
    return redirect()->route('admin.property.image', $image->property_id);
}
    public function changestatus($id, $status){
        $condition=[];
        switch($status){
            case 'approve': 
                $condition['approved']=1;
            break;
            case 'activate': 
                $condition['status']=1;
            break;
            case 'deactivate': 
                $condition['status']=0;
            break;            
        }
        if(count($condition)>0){
            Property::where('id', $id)->update($condition);
        }
        return redirect()->back();
    }

    public function leads($propertyID)
    {
        //
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $data = [];
        //$data['property_type'] = PropertyType::get();
        $data['leads'] = Leads::where('property_id',$propertyID)->orderBy('id','DESC')->paginate(10);

        return view('admin.property.leads', compact('data'));
    }
    public function updateviewed(Request $request){
        $leadId = $request->input('lead_id');
        $viewed = $request->input('viewed');
    
        // Find the contact by ID and update the 'viewed' field
        $contact = Leads::find($leadId);
        if ($contact) {
            $contact->viewed = $viewed;
            $contact->save();
    
            return response()->json(['message' => 'Lead updated successfully'], 200);
        }
    
        return response()->json(['message' => 'Lead not found'], 404);  
    }
}
