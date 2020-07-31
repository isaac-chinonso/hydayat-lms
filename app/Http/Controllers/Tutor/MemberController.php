<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Member;

class MemberController extends Controller
{
      //Save class Function
      public function savemember(Request $request)
      {
          $user = Auth::user();
          // Validation
          $this->validate($request, [
              'user_id' => 'required',
              'classname_id' => 'required',
          ]);
  
          // Save Record into member DB
         $member = new Member();
         $member->user_id = $request->input('user_id');
         $member->classname_id = $request->input('classname_id');

         if (Member::where('user_id', '=', $member->user_id)->where('classname_id', '=',  $member->classname_id)->exists()) {
            return redirect()->back()->with('warning_message', 'Student already Enrolled to this class and cant be re-enrolled');
        } else {

         $member->save();
  
          \Session::flash('Success_message', '✔ member Successfully Added.');
  
              return redirect()->route('tutormember');
        }
      }
  
       public function deletemember($id)
      {
          // Delete Member
         $member = Member::where('id',$id)->first();
         $member->delete();
          
          \Session::flash('Success_message','You Have Successfully Deleted file');
  
           return back();
      }
}
