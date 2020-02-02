<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\Category;

class f_post extends Controller
{
    public function showPost(){
        $posts = Post::orderBy('post_id', 'desc')->paginate(2); // paginate(): to bring just 2 and then i can navigate to load them all 
        // this operation is like the query in the vanilla PHP 
        return view('posts.posts', compact('posts')); // (path, sending data) 'posts': i'll use this variable to extract the data from it 
    }

    // this controller function is to show the form that will insert new post by
    public function addNewPost() {
        // i need to pass all my categories to the template 
        $categories = Category::all();
        return view('admin.add_new_post', compact('categories'));
    }

    public function insertPost(Request $err){ // activate the error handler 
        $err->validate([
            // set our validation steps and rules
            "post_title"=> "required|min:4|max:50", // this field is required - min:4 minimum allowed characters 
            // max:50 maximum allowed character is 50 - unique and it should be unique in the database 
            "post_body"=> "required|min:20", 
            "post_category"=> "required"
        ], 
        [
            // hrer i could put mu own message"
            "post_title.required" => "الحقل لا يجب أن يكون فارغ", 

        ]
    );
        // here i will collect the post information that sent by the form that i linked to 
        $addPost = new Post; // create new instance from my model 

        $addPost->post_title = request('post_title'); // request('name_of_the_field_in the form')
        $addPost->post_content = request('post_body');
        $addPost->post_cat = request('post_category');
        $addPost->post_user = request('user_id');

        $addPost->save(); // to run the instruction actually and move the data to the database 
        

        return redirect('/posts');
    }

    // Edit:

    public function updatePost($post_id) { // pass the is that was sended by the web 
        $categories = Category::all();
        $updated_post = Post::find($post_id); // here i need to set $id as a primary key in my model to avoid the confusion 
        return view('admin.update', compact('categories', 'updated_post'));
    }

    public function editPost($post_id) {
        // here i want to actually update the record in the database 
        $update = Post::find($post_id);

        $update->post_title = request('post_title');
        $update->post_content = request('post_body');
        $update->post_cat = request('post_category');
        $update->post_user = request('user_id');

        $update->save();
        return redirect('/posts');
    }

}
