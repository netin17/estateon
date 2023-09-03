<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Property;
use App\PropertyType;
use App\Testimonials;
use App\User;
use App\Cities;
use App\Ui;
use App\PropertySlider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Silber\Bouncer\Database\Role;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        //print '<pre>'; print_r(Auth::guard('frontuser')->user()); die;
        $category = $request->input('category', 'R');
        $data['property_type'] = PropertyType::select(['id', 'name','property_type'])->whereNotIn('name', ['Other','Featured',"New Posting"])->get();
        $data['sliders'] = $this->getsliders();
        // $data['by_admin'] = $this->getByAdmin();
        // $data['by_users'] = $this->getByUsers();
     
        // $data['section'] = Ui::Where('name','home')->with('uimeta.uimetadata')->get();
        $data['category'] = $category;
        $data['testimonials'] = Testimonials::get();
        // dd($data['hot_featured']['hot'][0]);
        return view('estate.home', compact('data'));
    }

    public function getsliders()
    {
        $userId = "";
        if (Auth::check()) {
            $userId = Auth::id();
        }
        // echo "<pre>"; print_r($data);
        // exit;

$sliders=PropertySlider::with(['properties'=>function($pquery) use($userId){
    $pquery->where('status',1);
    $pquery->with(['amenities' => function ($aquery) {
        $aquery->with(['amenity_data']);
    }, 'vastu.vastu_data', 'preferences.preferences_data','property_type.type_data', 'property_details'=>function($dquery){
        $dquery->with(['city']);
    }, 'images'=>function($iquery){
        $iquery->where('featured',1);
    }]);
    if ($userId != "") {
        $pquery->where('user_id', '!=', $userId)->withCount([
            'likes' => function ($query) use ($userId) {
                $query->where('user_id', $userId);
                $query->select(DB::raw('IF(count(*) > 0, 1, 0)'));
            }
        ]);
    }
}])->get();

        return ['code' => '101', 'slider' => $sliders, 'status' => true];
    }


    public function getByAdmin()
    {
        $userId = "";
        if (Auth::check()) {
            $userId = Auth::id();
        }
        // echo "<pre>"; print_r($data);
        // exit;
        $properties_hot = Property::where('created_by', 1)->where('approved', 1)->where('status', 1)->with(['amenities.amenity_data', 'vastu.vastu_data', 'preferences.preferences_data', 'owner.roles' => function ($query) {
            $query->select('name');
        }, 'property_type.type_data', 'property_details', 'images']);
        if ($userId != "") {
            $properties_hot->where('user_id', '!=', $userId)->withCount([
                'likes' => function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                    $query->select(DB::raw('IF(count(*) > 0, 1, 0)'));
                }
            ]);
        }
        $radius = 30;
        if (isset($data['lat']) && isset($data['lng'])) {
            $properties_hot->selectRaw("( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) )* cos( radians( lng ) - radians(?)) + sin( radians(?) ) * sin( radians( lat ) ) )) AS distance", [$data['lat'], $data['lng'], $data['lat']]);
        }
        $hotproperty = $properties_hot->limit(10)->orderByDesc('created_at')->get();
        return $hotproperty;
    }

    public function getByUsers()
    {
        $userId = "";
        if (Auth::check()) {
            $userId = Auth::id();
        }
        // echo "<pre>"; print_r($data);
        // exit;
        $properties_hot = Property::where('created_by','!=', 1)->where('approved', 1)->where('status', 1)->with(['amenities.amenity_data', 'vastu.vastu_data', 'preferences.preferences_data', 'owner.roles' => function ($query) {
            $query->select('name');
        }, 'property_type.type_data', 'property_details', 'images']);
        if ($userId != "") {
            $properties_hot->where('user_id', '!=', $userId)->withCount([
                'likes' => function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                    $query->select(DB::raw('IF(count(*) > 0, 1, 0)'));
                }
            ]);
        }
        $radius = 30;
        if (isset($data['lat']) && isset($data['lng'])) {
            $properties_hot->selectRaw("( 6371 * acos( cos( radians(?) ) * cos( radians( lat ) )* cos( radians( lng ) - radians(?)) + sin( radians(?) ) * sin( radians( lat ) ) )) AS distance", [$data['lat'], $data['lng'], $data['lat']]);
        }
        $hotproperty = $properties_hot->limit(10)->orderByDesc('created_at')->get();
        return $hotproperty;
        
    }

    public function signin(Request $request){
        if($user = Auth::guard('frontuser')->user())
        {
            return redirect()->route('home.index');
        }else{ 
            $referrer = $request->server('HTTP_REFERER');
            session(['referrer' => $referrer]);
            return view('estate.signin', compact('referrer'));
        }
       
    }
    public function signup(){
        if($user = Auth::guard('frontuser')->user())
{
    return redirect()->route('home.index');
}else{
    $data['roles'] = Role::whereNotIn('name', ['administrator','Deepak Murheker','assistant'])->get()->pluck('name', 'name');
    // echo "<pre>"; print_r($roles);
    // exit;
    return view('estate.signup', compact('data'));
}
    }
    public function postsignup(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'regex:/^[a-zA-Z\s]+$/'], // Allow only letters and spaces
            'email' => 'required|email|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'min:6'
        ]);
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email') == "" ? NULL : $request->get('email'),
            'password' => $request->get('password') == "" ? NULL : Hash::make($request->get('password')),
            'phone' => $request->get('phone') == "" ? NULL : $request->get('phone')
        ]);
        $user->assign('user');
        return redirect()->route('home.signin');
        // echo "<pre>"; print_r($postdata);
        // exit;
    }
    public function postsignin(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            //'password' => 'required|min:6',
        ]);
                if (Auth::guard('frontuser')->attempt(['email' => $request->email, 'password' => $request->password, 'user_level' => 0])) {
           $user=Auth::guard('frontuser')->user();
            if($user->isAdmin){
                return redirect()->intended(route('admin.home'));
            }else {
                // Check if previous URL is the signup page
                $referrer = $request->input('referrer');
            if ($referrer && filter_var($referrer, FILTER_VALIDATE_URL)) {
                return redirect()->away($referrer);
            } else {
                return redirect()->route('home.index');
            }
            }
    }else{
                return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'email' => Lang::get('auth.failed'),
                ]);
            }
}
public function logout(Request $request) {
    Auth::guard('frontuser')->logout();
    return redirect('/');
  }
  public function invcaptcha()
  {
      return view('estate.phonesignin');
  }
  public function getCitiesByState(Request $request, $stateId){
    try {
      $cities=Cities::where('state_id', $stateId)->get();

      return response()->json($cities);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to get cities']);
    }
  }
}
