<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Classname;

class ClassController extends Controller
{
    //Save class Function
    public function saveclass(Request $request)
    {
        $user = Auth::user();
        // Validation
        $this->validate($request, [
            'title' => 'required',
        ]);

        // Save Record into class DB
        $classname = new Classname();
        $classname->title = $request->input('title');

        if (Classname::where('title', '=', $classname->title)->exists()) {
            return redirect()->back()->with('warning_message', 'Class Already Exist and cant be re-added');
        } else {

        $classname->save();

        \Session::flash('Success_message', '✔ Class Successfully Added.');

            return redirect()->route('tutorclasses');
        }
    }

     // Update Class function
     public function updateclass(Request $request, $id)
     {
             $classname = Classname::find($id);
             // Validation
                $this->validate($request, array(
                   'title' => 'required',
                )); 
 
             $classname = Classname::find($id);  
 
             $classname->title = $request->input('title');

             $classname->save();
                 
         \Session::flash('Success_message','✔ Record Updated Succeffully');
 
          return back();
     }

     public function deleteclass($id)
    {
        // Delete Class
        $classname = Classname::where('id',$id)->first();
        $classname->delete();
        
        \Session::flash('Success_message','You Have Successfully Deleted file');

         return back();
    }
}
