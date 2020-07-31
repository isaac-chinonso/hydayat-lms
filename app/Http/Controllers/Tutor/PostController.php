<?php

namespace App\Http\Controllers\Tutor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;
use Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //Save class Function
    public function savePost(Request $request)
    {
        $user = Auth::user();
        // Validation
        $this->validate($request, [
            'title' => 'required',
            'classname_id' => 'required',
            'video' => 'required',
            'text' => 'required',
        ]);

        $title = $request['title'];

        $classname_id = $request['classname_id'];

        $text = $request['text'];

        // save image 
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $destination = public_path('upload/video');
            $video->move($destination, $filename);
        }

        // Save Record into Post DB
        $post = new Post();
        $post->title = $title;
        $post->classname_id = $classname_id;
        $post->video = $filename;
        $post->text = $text;

        if (Post::where('title', '=', $post->title)->exists()) {

            return redirect()->back()->with('warning_message', 'Post already exist and cant be added twice');
        } else {

            $post->save();

            \Session::flash('Success_message', '✔ Post Successfully Added.');

            return redirect()->route('tutorpost');
        }
    }

    // Update Post function
    public function updatepost(Request $request, $id)
    {

        // Validation
        $this->validate($request, array(
            'title' => 'required',
            'classname_id' => 'required',
            'text' => 'required',
        ));

        $post = Post::where('id', $id)->first();

        $post->title = $request->input('title');
        $post->classname_id = $request->input('classname_id');
        $post->text = $request->input('text');;

        $post = Post::where('id', $id)->first();

        if ($request->hasFile('video')) {
            //add the new video
            $video = $request->file('video');
            $filename = time() . '.' . $video->getClientOriginalExtension();
            $destination = public_path('upload/video');
            $video->move($destination, $filename);
            $oldFilename = public_path() . '/upload/video/' . $post->video;
            // update the database
            $post->video = $filename;
            // delete the old photo
            unlink($oldFilename);
        }

        $post->save();
        
        \Session::flash('Success_message', '✔ Record Updated Succeffully');

        return back();
    }

    public function deletePost($id)
    {
        // Delete Lesson
        $post = Post::where('id', $id)->first();
        $file_path = public_path() . '/upload/video/' . $post->video;
        unlink($file_path);

        $post->delete();

        \Session::flash('Success_message', 'You Have Successfully Deleted file');

        return back();
    }
}
