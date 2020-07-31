<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Message;
use Image;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
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

        return redirect()->route('tutormessage');
    }

    public function deletemessage($id)
    {
        // Delete Message
        $message = Message::where('id', $id)->first();
        $message->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted message');

        return back();
    }

}
