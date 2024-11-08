<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\post;
use GrahamCampbell\ResultType\Success;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Post as GlobalPost;

class PostController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function ourFileStore(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);

        //upload image
        $imageName = null;
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        //Add new post
        $post = new post();

        $post->name = $request->name;
        $post->description = $request->description;
        $post->image = $imageName;

        $post->save();
        flash()->success('your post has been created successfully!');
        return redirect()->route('home');
    }

    public function editdata($id)
    {
        $post = Post::findOrFail($id);
        return view('edit', ['ourPost' => $post]);
    }

    public function updateData($id, Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg',
        ]);




        //Update post
        $post = Post::findOrFail($id);
        $post->name = $request->name;
        $post->description = $request->description;
        //upload image
        if (isset($request->image)) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $post->image = $imageName;
        }

        $post->save();
        flash()->success('your post has been updated successfully!');
        return redirect()->route('home');
    }

    public function deleteData($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        flash()->success('your post has been deleted successfully!');
        return redirect()->route('home');
    }
}
