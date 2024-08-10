<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Card;
use App\Builder;
use App\BuilderDetail;

class BuildersController extends Controller
{
    //
    public function cardCreate()
    {
        $data=[];
        $data['cards']=Card::get();
        return view('admin.builders.cards.add',compact(['data']));
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


    public function editcard($id){
        $data=[];
        $data['card']=Card::findOrFail($id);
        return view('admin.builders.cards.edit',compact(['data']));
    }
    public function updatecard(Request $request, $id){
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $card = Card::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($card->image) {
                Storage::disk('public')->delete($card->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $card->image = $imagePath;
        }
        if ($request->hasFile('thumbnail')) {
            if ($card->image) {
                Storage::disk('public')->delete($card->thumbnail);
            }
         
            $thumbnailPath = $request->file('thumbnail')->store('card_thumbnails', 'public');
           
            $card->thumbnail = $thumbnailPath;
        }
        $card->save();
        return redirect()->route('admin.card.create')->with('success', 'Card updated successfully.');
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
        $data['builder']=Builder::where('id', $id)->with(['details'])->first();
        
        return view('admin.builders.builder.editrequests', compact('data'));
        ///return view//
    }

    public function updateBuilder(Request $request, $id){
        $validatedData = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email'], // Add email validation
            'company_name' => ['required', 'max:255'], // Add company name validation
            'contact_number' => ['required', 'regex:/^[6789]\d{9}$/'],
            'registration_number' => 'required|max:50',
            'id_proof' => 'nullable|mimes:jpeg,jpg,png,pdf|max:2048',
            'comment' => 'nullable',
            'detail_company_name' => 'required',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required',
            'portfolio' => 'nullable|url',
            'total_experience' => 'required|numeric',
            'total_projects' => 'required|numeric',
            'total_flexible_living' => 'nullable|numeric',
            'running_projects' => 'nullable|numeric',
            'completed_projects' => 'nullable|numeric',


        ], [
            'name.required' => 'The name field is required.',
            'name.regex' => 'The name field should only contain letters and spaces.',
            'email.required' => 'The email field is required.', // Email validation message
            'email.email' => 'Please enter a valid email address.', // Email validation message
            'company_name.required' => 'The company name field is required.', // Company name validation message
            'company_name.max' => 'The company name may not be greater than :max characters.', // Company name validation message
            'contact_number.required' => 'The contact number field is required.',
            'contact_number.regex' => 'Please enter a valid Indian contact number.',
            'registration_number.required' => 'The registration number field is required.',
            'registration_number.max' => 'The registration number may not be greater than :max characters.',
            'id_proof.required' => 'An ID proof file is required.',
            'id_proof.mimes' => 'The ID proof must be a file of type: jpeg, jpg, png, pdf.',
            'id_proof.max' => 'The ID proof file size must not exceed :max kilobytes.',
            'detail_company_name.required' => 'Company name is required'

        ]);

$builder = Builder::findOrFail($id);
//builder//
$builder->name= $request->input('name');
$builder->email= $request->input('email');
$builder->contact_number= $request->input('contact_number');
$builder->company_name= $request->input('company_name');
$builder->registration_number= $request->input('registration_number');

if ($request->hasFile('id_proof')) {
    if ($builder->id_proof) {
        Storage::disk('public')->delete($builder->id_proof);
    }
    $imagePath = $request->file('id_proof')->store('id_proof', 'public');
    $builder->id_proof = $imagePath;
}

$builder->comment= $request->input('comment');
$builder->status= $request->input('status');

$builder->save();


$builder_detail = BuilderDetail::where('builder_id', $id)->first();

$builder_detail->company_name= $request->input('detail_company_name');

if ($request->hasFile('company_logo')) {
    if ($builder_detail->company_logo) {
        Storage::disk('public')->delete($builder_detail->company_logo);
    }
    $imagePathL = $request->file('company_logo')->store('company_logo', 'public');
    $builder_detail->company_logo = $imagePathL;
}


if ($request->hasFile('banner_image')) {
    if ($builder_detail->banner_image) {
        Storage::disk('public')->delete($builder_detail->banner_image);
    }
    $imagePathB = $request->file('banner_image')->store('banner_image', 'public');
    $builder_detail->banner_image = $imagePathB;
}

$builder_detail->description= $request->input('description');
$builder_detail->portfolio= $request->input('portfolio');
$builder_detail->total_experience= $request->input('total_experience');
$builder_detail->total_projects= $request->input('total_projects');
$builder_detail->total_flexible_living= $request->input('total_flexible_living');
$builder_detail->running_projects= $request->input('running_projects');
$builder_detail->completed_projects= $request->input('completed_projects');
$builder_detail->save();

return redirect()->route('admin.builders.requests')->with('success', 'Blog updated successfully.');
    }
}
