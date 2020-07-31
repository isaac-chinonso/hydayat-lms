<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Classname;
use App\Member;
use App\Post;
use App\User;
use App\Message;
use App\Assignment;
use App\VideoStatusVerify;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function dashboard()
    {
        $data['class'] = Classname::count();
        $data['post'] = Post::count();
        $data['user'] = User::where('role_id', 2)->count();
        $data['member'] = Member::count();
        return view('tutor.dashboard', $data);
    }

    public function classes()
    {
        $data['class'] = Classname::all();
        return view('tutor.class', $data);
    }

    public function student()
    {
        $data['user'] = User::where('role_id', 2)->get();
        return view('tutor.student', $data);
    }

    public function member()
    {
        $data['class'] = Classname::all();
        $data['member'] = Member::all();
        $data['users'] = User::where('role_id', 2)->get();
        return view('tutor.member', $data);
    }

    public function post()
    {
        $user = Auth::user();
        $data['class'] = Classname::all();
        $data['post'] = Post::all();
        return view('tutor.post', $data);
    }

    public function editpost($id)
    {
        $data['class'] = Classname::all();
        $data['post'] = Post::where('id', $id)->first();
        return view('tutor.editpost', $data);
    }

    public function message()
    {
        $user = Auth::user();
        $data['users'] = User::where('role_id', 2)->get();
        $data['sent'] = Message::where('user_id', 1)->get();
        $data['inbox'] = Message::where('reciever_id', 1)->get();
        return view('tutor.message', $data);
    }

    public function account()
    {
        $user = Auth::user();
        $data['users'] = User::where('role_id', 1)->first();
        return view('tutor.account', $data);
    }

    public function assignment($id)
    {
        $data['post'] = Post::where('id', $id)->first();
        $data['assignment'] = Assignment::where('post_id', $data['post']->id)->get();
        return view('tutor.assignment', $data);
    }

    public function deleteassignment($id)
    {
        // Delete Asignment
        $assignment = Assignment::where('id', $id)->first();
        $file_path = public_path() . '/upload/assignment/' . $assignment->image;
        unlink($file_path);
        $assignment->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted file');

        return back();
    }

    public function videostatus($id)
    {
        $data['post'] = Post::where('id', $id)->first();
        $data['postvideostatus'] = VideoStatusVerify::where('post_id', $data['post']->id)->get();
        return view('tutor.videostatus', $data);
    }

    public function deleteuservideostatus($id)
    {
        // Delete video status
        $videostatusverify = VideoStatusVerify::where('id', $id)->first();
        $videostatusverify->delete();


        \Session::flash('Success_message', 'You Have Successfully Deleted file');

        return back();
    }
}
