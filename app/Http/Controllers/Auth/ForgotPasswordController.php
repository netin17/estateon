<?php 
  
namespace App\Http\Controllers\Auth; 
  
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request; 
use DB; 
use Carbon\Carbon; 
use Mail; 
use Hash;
use Illuminate\Support\Str;
  
class ForgotPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showForgetPasswordForm()
      {
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);
  
          $token = Str::random(64);

          DB::table('password_resets')
          ->where('email', $request->email)
          ->delete();

          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
  
          Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return redirect()->route('forger.check.email', ['email' => $request->email]);
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      // public function showResetPasswordForm($token) { 
      //    //return view('auth.forgetPasswordLink', ['token' => $token]);
      //    return view('auth.passwords.reset', ['token' => $token]);
      // }
  


   public function showResetPasswordForm(Request $request, $token = null)
            {
                return view('auth.passwords.reset')->with(
                    ['token' => $token, 'email' => $request->email]
                );
            }

            
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
  
          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          return redirect()->route('reset.password.confirm');
      }
      public function checkemail($email){
        $user_email= $email;
        return view('auth.checkemail', compact('user_email'));
      }
      public function resetConfirm(){
        return view('auth.passwords.resetconfirm');
      }
}