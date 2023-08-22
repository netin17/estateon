<?php

namespace App\Http\Controllers\FrontUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Builder;
use App\BuilderDetail;
use App\BuilderCard;
use App\Card;
use App\States;
use App\Propertydetail;
use App\BuilderFeatureProperty;
use App\Cities;
use App\User;
use App\Traits\CommonTrait;

class BuilderController extends Controller
{
    use CommonTrait;
    public function createBuilder(Request $request)
    {
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            $data['profile_created'] = Builder::where('user_id', $userId)->with(['details'])->first();
            // echo "<pre>"; print_r( $data['profile_created']->toArray());
            // exit;
            return view('builder.create_builder', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();

            $validatedData = $request->validate([
                'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'],
                'contact_number' => ['required', 'regex:/^[6789]\d{9}$/'],
                'registration_number' => 'required|max:50',
                'id_proof' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                'comment' => 'nullable',

            ], [
                'name.required' => 'The name field is required.',
                'name.regex' => 'The name field should only contain letters and spaces.',
                'contact_number.required' => 'The contact number field is required.',
                'contact_number.regex' => 'Please enter a valid Indian contact number.',
                'registration_number.required' => 'The registration number field is required.',
                'registration_number.max' => 'The registration number may not be greater than :max characters.',
                'id_proof.required' => 'An ID proof file is required.',
                'id_proof.mimes' => 'The ID proof must be a file of type: jpeg, jpg, png, pdf.',
                'id_proof.max' => 'The ID proof file size must not exceed :max kilobytes.',

            ]);
            $builderExists = Builder::where('user_id', $userId)->exists();
            if ($builderExists) {
                return back()->withErrors(['user_id' => 'The builder already exists for the current user.']);
            }
            $idProofPath = $request->file('id_proof')->store('id_proofs', 'public');

            Builder::create([
                'user_id' => $userId,
                'name' => $validatedData['name'],
                'contact_number' => $validatedData['contact_number'],
                'registration_number' => $validatedData['registration_number'],
                'id_proof' => $idProofPath,
                'comment' => $validatedData['comment'],
                'status' => 'inactive',
            ]);

            return redirect()->route('frontuser.builder.create')->with('success', 'Builder created successfully.');
        } else {
            return redirect()->route('home.index');
        }
    }

    public function createProfile(Request $request)
    {
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            return view('builder.create_profile', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }

    public function profileStore(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $alreadyProfile = Builder::where('user_id', $userId)->with(['details'])->first();
            if ($alreadyProfile && !$alreadyProfile->details) {
                $validatedData = $request->validate([
                    'company_name' => 'required',
                    'company_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                    'description' => 'required',
                    'portfolio' => 'nullable|url',
                    'total_experience' => 'required|numeric',
                    'total_projects' => 'required|numeric',
                    'total_flexible_living' => 'nullable|numeric',
                    'running_projects' => 'nullable|numeric',
                    'completed_projects' => 'nullable|numeric',
                ]);


                $companyLogoPath = $request->file('company_logo')->store('builder_logos', 'public');
                $bannerImagePath = $request->file('banner_image')->store('banner_images', 'public');

                BuilderDetail::create([
                    'user_id' => $userId,
                    'builder_id' => $alreadyProfile->id,
                    'company_name' => $validatedData['company_name'],
                    'company_logo' => $companyLogoPath,
                    'banner_image' => $bannerImagePath,
                    'description' => $validatedData['description'],
                    'portfolio' => $validatedData['portfolio'],
                    'total_experience' => $validatedData['total_experience'],
                    'total_projects' => $validatedData['total_projects'],
                    'total_flexible_living' => $validatedData['total_flexible_living'],
                    'running_projects' => $validatedData['running_projects'],
                    'completed_projects' => $validatedData['completed_projects'],
                ]);

                return redirect()->route('frontuser.builder.cards')->with('success', 'Builder detail created successfully.');
            } else {
                return redirect()->route('frontuser.builder.profile_edit');
            }
        } else {
            return redirect()->route('home.index');
        }
    }

    public function editProfile(Request $request){
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            $data['builder_detail'] =  BuilderDetail::where('user_id', $userId)->first();
            return view('builder.edit_profile', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }
    public function updateProfile(Request $request, $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
    
            $validatedData = $request->validate([
                'company_name' => 'required',
                'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required',
                'portfolio' => 'nullable|url',
                'total_experience' => 'required|numeric',
                'total_projects' => 'required|numeric',
                'total_flexible_living' => 'nullable|numeric',
                'running_projects' => 'nullable|numeric',
                'completed_projects' => 'nullable|numeric',
            ]);
    
            $builderDetail = BuilderDetail::findOrFail($id);
            $builderDetail->company_name = $validatedData['company_name'];
            $builderDetail->description = $validatedData['description'];
            $builderDetail->portfolio = $validatedData['portfolio'];
            $builderDetail->total_experience = $validatedData['total_experience'];
            $builderDetail->total_projects = $validatedData['total_projects'];
            $builderDetail->total_flexible_living = $validatedData['total_flexible_living'];
            $builderDetail->running_projects = $validatedData['running_projects'];
            $builderDetail->completed_projects = $validatedData['completed_projects'];
            // Update other fields...
    
            // Handle company logo and banner image if provided
            if ($request->hasFile('company_logo')) {
                // Delete the previous logo
                Storage::delete($builderDetail->company_logo);
    
                $logoPath = $request->file('company_logo')->store('builder_logos', 'public');
                $builderDetail->company_logo = $logoPath;
            }
    
            if ($request->hasFile('banner_image')) {
                // Delete the previous banner image
                Storage::delete($builderDetail->banner_image);
    
                $bannerPath = $request->file('banner_image')->store('builder_banners', 'public');
                $builderDetail->banner_image = $bannerPath;
            }
    
            $builderDetail->save();
    
            return redirect()->route('frontuser.builder.cards')->with('success', 'Builder detail updated successfully.');
        } else {
            return redirect()->route('home.index');
        }
    }
    public function builderCards(Request $request)
    {
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            $data['all_cards'] = Card::where('status', 'active')->get();
            $data['states'] = States::where('country_id', 101)->get();
            $alreadyProfile = Builder::where('user_id', $userId)->with(['details'])->first();
            $data['saved_card'] = BuilderCard::where('user_id', $userId)->where('builder_id', $alreadyProfile->id)->with(['card', 'city'])->get();
            //  echo "<pre>"; print_r( $data['saved_card']->toArray());
            //             exit;
            return view('builder.builder_cards', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }

    public function cardStore(Request $request)
    {

        if (Auth::check()) {
            $userId = Auth::id();
            $alreadyProfile = Builder::where('user_id', $userId)->with(['details'])->first();
            $validatedData = $request->validate([
                'state_id' => 'required',
                'city_id' => 'required',
                'card_id' => 'required',
            ], [
                'state_id.required' => 'The state field is required.',
                'city_id.required' => 'The City field is required.',
                'card_id.required' => 'The Card field is required.'
            ]);

            BuilderCard::create([
                'user_id' => $userId,
                'builder_id' => $alreadyProfile->id,
                'state_id' => $validatedData['state_id'],
                'city_id' => $validatedData['city_id'],
                'card_id' => $validatedData['card_id']
            ]);
        }
        return redirect()->route('frontuser.builder.cards')->with('success', 'Card saved successfully.');
    }

    public function editCard($id){
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['builder'] = Builder::where('user_id', $userId)->with(['details'])->first();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            $data['all_cards'] = Card::where('status', 'active')->get();
            $data['card_details'] = BuilderCard::where('id', $id)->where('user_id', $userId)->with(['card'])->first();
          if(!$data['card_details']){
            return back()->withErrors(['invalid_card' => 'Card not found']);
          }
          $data['states'] = States::where('country_id', 101)->get();
          $data['cities'] = Cities::where('state_id', $data['card_details']->state_id)->get();

            //  echo "<pre>"; print_r( $data['saved_card']->toArray());
            // exit;
            return view('builder.edit_card', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }

    public function updateCard(Request $request, $id){
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();

        $validatedData = $request->validate([
            'state_id' => 'required',
            'city_id' => 'required',
            'card_id' => 'required',
        ]);
    
        // Update the card details
        $cardDetails = BuilderCard::findOrFail($id);
        $cardDetails->state_id = $validatedData['state_id'];
        $cardDetails->city_id = $validatedData['city_id'];
        $cardDetails->card_id = $validatedData['card_id'];
        $cardDetails->save();
    
        // Delete entries in BuilderFeatureProperty for unselected cities
        $selectedCities = BuilderCard::where('user_id', $userId)
            ->pluck('city_id')
            ->toArray();

        BuilderFeatureProperty::where('user_id', $userId)
            ->whereNotIn('city_id', $selectedCities)
            ->delete();

        return redirect()->route('frontuser.builder.cards')->with('success', 'Card details updated successfully.');
    } else {
        return redirect()->route('home.index');
    }
    }
    public function cardsProjects()
    {
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['builder'] = Builder::where('user_id', $userId)->with(['details'])->first();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            $data['saved_card'] = BuilderCard::where('user_id', $userId)->where('builder_id', $data['builder']->id)->with(['card', 'city'])->get();
            $data['selectedPropertyIds'] = BuilderFeatureProperty::where('user_id', $userId)->pluck('property_id')->toArray();
            foreach ($data['saved_card'] as $cards) {
                $cards->city->projects = Propertydetail::where('city_id', $cards->city->id)->with(['property'])
                    ->whereHas('property', function ($query) use ($userId) {
                        $query->where('user_id', $userId);
                        $query->where('status', 1);
                    })
                    ->get();
            }

            //  echo "<pre>"; print_r( $data['saved_card']->toArray());
            // exit;
            return view('builder.builder_cards_projects', compact('data'));
        } else {
            return redirect()->route('home.index');
        }
    }



    public function savecardsProjects(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $data = $request->input('project');
            $builder = Builder::where('user_id', $userId)->first();
            //  echo "<pre>"; print_r($data);
            //     exit;
            // delete previously selected projects
            BuilderFeatureProperty::where('user_id', $userId)->delete();
            // Loop through the submitted data and save it to your database
            foreach ($data as $cardId => $cities) {
                foreach ($cities as $cityId => $projectIds) {
                    foreach ($projectIds as $projectId) {
                        BuilderFeatureProperty::create([
                            'user_id' => $userId,
                            'builder_id' => $builder->id,
                            'city_id' => $cityId,
                            'property_id' => $projectId,
                            'builder_card_id' => $cardId,
                            'status' => 'active', // Set the desired status value
                        ]);
                    }
                }
            }
            return redirect()->route('frontuser.cards.projects')->with('success', 'Projects updated successfully.');
        } else {
            return redirect()->route('home.index');
        }
        // Redirect or return a response as needed
    }

    public function contactSupport(){
        if (Auth::check()) {
           
                $userId = Auth::user()->id;
               
                   
                $data['user'] = $this->getUserDetailsById($userId);
                $data['p_count'] = $this->getUserPropertyCount($userId);
                $data['is_builder'] = $this->getbuilderstatus($userId);
                    $data['states'] = States::where('country_id', 101)->get();
                    
            //                     echo "<pre>"; print_r($data['plans']->toArray()); echo "<pre>";
            // exit;
                    return view('builder.support_contact', compact('data'));
                   }
           
        } 
    
}
