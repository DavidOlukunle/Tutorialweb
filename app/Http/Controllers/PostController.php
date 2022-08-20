<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class PostController extends Controller
{
    //All listing
    public function index(){
        return view('posts.index',[ 
        'posts'=>Post::latest()->filter(request(['tag','search']))->paginate(4)
            
        ]);

    }

    //single posts
    public function show(Post $post){
        return view('posts.show', [
            'post'=>$post
        ]);

    }

    //show create form
    public function create(){
        return view('posts.create');
    }

    //store posts data
    public function store(Request $request){
        $formFields=$request->validate([
            'title'=>'required',
            'name'=>['required',Rule::unique('posts','name')],
            'location'=>'required',
            'description'=>'required',
            'email'=>'required',
            'tags'=>'required'
            
        ]);
        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos','public');
        }

        $formFields['user_id']=auth()->id();

        Post::create($formFields);
       
return redirect('/')->with('message','Your tutorial has been listed.');
    }



//show edit form
public function edit(Post $post){
   
    return view('posts.edit',['post'=>$post]);
}

//update post data
public function update(Request $request, Post $post){
    $formFields=$request->validate([
        'title'=>'required',
        'name'=>['required'],
        'location'=>'required',
        'description'=>'required',
        'email'=>'required',
        'tags'=>'required'
        
    ]);
    if($request->hasFile('logo')){
        $formFields['logo']=$request->file('logo')->store('logos','public');
    }
    $post->update($formFields);
   
return back()->with('message','Your tutorial has been updated successfully.');
}

//delete post
public function delete(Post $post){
    $post->delete();
    return redirect('/')->with('message','post deleted successfully');
}


//manage posts
public function manage() {
    return view('posts.manage',['posts'=>auth()->user()->post()->get()]);
}

}