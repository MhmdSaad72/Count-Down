<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ConfirmationMail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /*=====================================================
                  Update admin profile
    =======================================================*/
    public function updateUser(Request $request,User $user)
    {
      return redirect()->back()->with('flash_message','This feature is not available in the demo version');
      $this->validate($request,[
        'full_name' => 'required|max:100',
        'user_name' => 'required|max:100|alpha_num',
        'email' => 'required|email|max:100',
        'password' => 'required_with:new_password|nullable|min:8|max:30',
        'new_password' => 'required_with:password|nullable|min:8|max:30|different:password',
        'password_confirmation' => 'required_with:new_password|nullable|same:new_password|min:8|max:30'
      ]);

      $requestData = $request->all();

      if (!$request->password) {
        $user->update([
          'full_name' => $requestData['full_name'],
          'user_name' => $requestData['user_name'],
          'email' => $requestData['email'],
        ]);
        return redirect()->back()->with('flash_message','Cool! You\'ve updated your data');

      }elseif (\Hash::check($request->password, $user->password)) {
         $user->update([
           'full_name' => $requestData['full_name'],
           'user_name' => $requestData['user_name'],
           'email' => $requestData['email'],
           'password' => \Hash::make($requestData['new_password']),
         ]);

          return redirect()->back()->with('flash_message','Cool! You\'ve updated your data');

      } else {
          return redirect()->back()->with('error','Error! invalid old password');
      }
    }

    /*==================================================
                    Add new subscriber
    ====================================================*/
    public function subscribe(Request $request)
    {
      $this->validate($request,[
        'email' => 'required|email'
      ]);

      $user = User::create([
        'email' => $request->email
      ]);

      Mail::to($user->email)->send(new ConfirmationMail($user));

      return redirect()->back()->with('flash_message','Cool! You have successfully subscribed');
    }

    public function verify($id)
    {
      $user = User::findOrFail($id);
      $user->update([
        'email_verified_at' => \Carbon\Carbon::now(),
      ]);
      return redirect()->route('home')->with('flash_message','Cool! your email is verified ');
    }


    public function destroy($id)
    {
      return redirect()->back()->with('flash_message','This feature is not available in the demo version');
      $user =  User::findOrFail($id);
      $user->delete();
      return redirect()->back()->with('flash_message','Y\'ve successfully deleted a subscriber');
    }
}
