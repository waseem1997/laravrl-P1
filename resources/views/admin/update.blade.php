@extends('layout')


@section('content')
<div class="container">
    <form action="{{url('/edit/' . $updated_post->post_id)}}" method= "POST" class="mt-4">
    @csrf <!-- we need to add this var to ant form in laravel -->


        <div class="form-group">
        <label for="titleField">Title Field</label> 
        <input type="text" id="titleField" name="post_title" value="{{$updated_post->post_title}}" class="form-control" placeholder="Post Title">
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" name= "user_id" >
        <div class="form-group">
        <label for="content">Post Body</label>
        <input type="text" id="content" name="post_body" value="{{$updated_post->post_content}}" class="form-control" placeholder="Post Body">
        </div>
        <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->cat_id}}" @if ($category->cat_id == $updated_post->cat_id) selected @endif >{{ $category->cat_name }}</option>
            @endforeach
        </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<div class="col-12">
    @foreach($errors->all() as $err)
        <div class= "alert alert-danger"> {{$err}} </div>
    @endforeach
</div>

@endsection()