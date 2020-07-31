<?php

namespace App\Http\Controllers\Student;

use App\Assignment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Classname;
use App\Post;
use App\Message;
use App\User;
use App\Member;
use App\VideoStatusVerify;

class PageController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $data['member'] = Member::where('user_id', $user->id)->count();
        return view('student.dashboard', $data);
    }

    public function class()
    {
        $user = Auth::user();
        $data['member'] = Member::where('user_id', $user->id)->get();
        return view('student.class', $data);
    }

    public function topic($id)
    {
        $data['post'] = Post::where('classname_id', $id)->get();
        return view('student.topic', $data);
    }

    public function starttopic($id)
    {
        $user = Auth::user();
        $data['post'] = Post::where('id', $id)->first();
        return view('student.view_topics', $data);
    }

    public function message()
    {
        $user = Auth::user();
        $data['users'] = User::where('role_id', 1)->get();
        $data['sent'] = Message::where('user_id', $user->id)->where('reciever_id', 1)->get();
        $data['inbox'] = Message::where('reciever_id', $user->id)->get();
        return view('student.message', $data);
    }

    //Save class Function
    public function sendmessage(Request $request)
    {
        $user = Auth::user();

        // Validation
        $this->validate($request, [
            'reciever_id' => 'required',
            'content' => 'required',
        ]);


        $message = new Message();
        $message->user_id = $user->id;
        $message->reciever_id = $request->input('reciever_id');
        $message->content = $request->input('content');
        // save image 
        if ($request->hasFile('attach')) {
            $attach = $request->file('attach');
            $filename = time() . '.' . $attach->getClientOriginalExtension();
            $destination = public_path('upload/message/');
            $attach->move($destination, $filename);

            $message->attach = $filename;
        }
        $message->save();

        \Session::flash('Success_message', '✔ Message Sent Successfully.');

        return redirect()->route('studentmessage');
    }

    //Save class Function
    public function sendassignment(Request $request)
    {
        $user = Auth::user();

        // Validation
        $this->validate($request, [
            'post_id' => 'required',
            'image' => 'required',
        ]);


        $post_id = $request['post_id'];
        
        // save image 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('upload/assignment');
            $image->move($destination, $filename);
        }

        // Save Record into message DB
        $assignment = new Assignment();
        $assignment->user_id = $user->id;
        $assignment->post_id = $post_id;
        $assignment->image = $filename;

        $assignment->save();


        \Session::flash('Success_message', '✔ Assignment Submitted Successfully.');

        return redirect()->route('studentclass');
    }

    
    //Save class Function
    public function savevideostatus(Request $request)
    {
        $user = Auth::user();

        // Validation
        $this->validate($request, [
            'post_id' => 'required',
        ]);


        $videostatusverify = new VideoStatusVerify();
        $videostatusverify->user_id = $user->id;
        $videostatusverify->post_id = $request->input('post_id');
        $videostatusverify->status = 1;
        $videostatusverify->save();

        \Session::flash('Success_message', '✔ Verified Successfully.');

        return back();
    }

    public function deletemessage($id)
    {
        // Delete Member
        $message = Message::where('id', $id)->first();
        $message->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted message');

        return back();
    }
}
