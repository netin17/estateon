<?php

namespace App\Http\Controllers\FrontUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PropertyVisitor;
use Illuminate\Support\Facades\Auth;
use App\UserSubscription;
use App\Traits\CommonTrait;
class PropertyVisitorController extends Controller
{
    use CommonTrait;
    public function visitProperty($propertyId)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is not the owner of the property
        if ($user && !$user->ownsProperty($propertyId)) {
            PropertyVisitor::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'property_id' => $propertyId,
                ],
                [
                    'visited_at' => now(), // Set the visited_at field
                ]
            );
            return response()->json(['message' => 'Property visit recorded successfully']);
        }

        return response()->json(['message' => 'Property visit could not be recorded.']);
    }

    public function visitors(Request $request){
        if (Auth::check()) {
            $data = [];
            $userId = Auth::id();
            $data['user'] = $this->getUserDetailsById($userId);
            $data['p_count'] = $this->getUserPropertyCount($userId);
            $data['is_builder'] = $this->getbuilderstatus($userId);
            
            $subscribed = UserSubscription::where('user_id', $userId)
                ->where('start_at', '<=', now())
                ->where('end_at', '>=', now())
                ->whereHas('payment', function($q){
                    $q->where('amount', '>', '0');
                })
                ->first();
            
            $limit = 10;
            if (!$subscribed) { 
                $request->merge(['page' => 1]); // Set the page to 1
                $limit = 3;
            }
            
            // Retrieve visitors whose properties belong to the current user
            $data['visitors'] = PropertyVisitor::whereHas('property', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->with(['property'=>function($propquery){
                $propquery->with(['property_details']);
            }, 'user']) // Include property data
            ->paginate($limit);
        //                 echo "<pre>"; print_r($data['visitors']->toArray()); echo "<pre>";
        // exit;
            // Return the data to your view or as a JSON response
            return view('dashboard.listviews', compact('data'));
        }
    }
}
