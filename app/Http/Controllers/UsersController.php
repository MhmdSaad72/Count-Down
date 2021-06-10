<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /*=====================================================
                  Update admin profile
    =======================================================*/
    public function updateUser(Request $request,User $user)
    {
      $this->validate($request,[
        'full_name' => 'required|max:100',
        'user_name' => 'required|max:100',
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
}
