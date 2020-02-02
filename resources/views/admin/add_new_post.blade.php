@extends('layout')


@section('content')
<div class="container">
    <form action="{{url('/insert_post')}}" method= "POST" class="mt-4">
    @csrf <!-- we need to add this var to ant form in laravel -->


        <div class="form-group">
        <label for="titleField">Title Field</label> 
        <input type="text" id="titleField" name="post_title" class="form-control" value="{{ old('post_title')}}" placeholder="Post Title">
        </div>
        <input type="hidden" value="{{Auth::user()->id}}" name= "user_id" >
        <div class="form-group">
        <label for="content">Post Body</label>
        <input type="text" id="content" name="post_body" value= "{{old('post_body')}}" class="form-control" placeholder="Post Body">
        </div>
        <div class="form-group">
        <label for="category">Category</label>
        <select name="post_category" id="category" class="form-control">
            @foreach($categories as $category)
            <option value="{{$category->cat_id}}">{{ $category->cat_name}}</option>
            @endforeach
        </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Insert new post</button>
    </form>
</div>

<div class="col-12">
    @foreach($errors->all() as $err)
        <div class= "alert alert-danger"> {{$err}} </div>
    @endforeach
</div>

@endsection()