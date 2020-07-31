<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Picture;
use Storage;

class UserController extends Controller
{
    // Login Function
    public function signin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'role_id' => '1'])) {

            return redirect()->intended(route('tutordashboard'));
        }

        if (Auth::attempt(['username' => $request['username'], 'password' => $request['password'], 'role_id' => '2'])) {

            return redirect()->intended(route('studentdashboard'));
        }

        \Session::flash('warning_message', 'These credentials do not match our records.');

        return redirect()->back();
    }

    //Save Users Function
    public function savelogin(Request $request)
    {
        // Validation
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Save Record into user DB
        $user = new User();
        $user->student_id = $request->input('student_id');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->password = bcrypt($request->input('password'));
        $user->role_id = 2;
        
        if (User::where('username', '=', $user->username)->where('role_id', '=', '2')->exists()) {
            return redirect()->back()->with('warning_message', 'Student already exist and cant be added');
        } else {
            $user->save();

            // Save Record into picture DB
            $picture = new Picture();
            $picture->user_id = $user->id;
            // save image 
            if ($request->hasFile('source')) {
                $source = $request->file('source');
                $filename = time() . '.' . $source->getClientOriginalExtension();
                $destination = public_path('upload/picture/');
                $source->move($destination, $filename);

                $picture->source = $filename;
            }
            $picture->save();


            \Session::flash('Success_message', 'You Have Successfully Registered');

            return redirect()->route('tutorstudent');
        }
    }

    // Update User function
    public function updateuser(Request $request, $id)
    {
        //validate post data
        $this->validate($request, [
            'username' => 'required',
        ]);

        $user = User::where("id", $id)->first();
        $user->student_id = $request->input('student_id');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->password =  bcrypt($request->input('password'));
        $user->save();

        $picture = Picture::where("user_id", $id)->first();

        if ($request->hasFile('source')) {
            // add the new photo 
            $source = $request['source'];
            $filename = time() . '.' . $source->getClientOriginalExtension();
            $destination = 'upload/picture';
            $source->move($destination, $filename);
            $oldfilename = $picture->source;
            // update the database
            $picture->source = $filename;
            // delete the old photo
            Storage::delete($oldfilename);
        }
        $picture->save();

        \Session::flash('Success_message', '✔ Record Updated Succeffully');

        return back();
    }

    public function deleteuser($id)
    {
        // Delete user
        $user = User::where('id', $id)->first();
        $user->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted file');

        return redirect()->route('tutorstudent');
    }


    // Logout Function
    public function logout()
    {
        $user = Auth::user();

        Auth::logout();
        return redirect()->route('login');
    }
}
