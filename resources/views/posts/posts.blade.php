<!-- this is the posts page 
    here i need to extend the layout file and set the section
 -->



 @extends('layout') <!-- extend layout page -->

 @section('content') <!-- define my section  -->

   <!-- start the body of the posts section -->
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-8">
                  @foreach($posts as $post)
                 <!-- posts variable that i send it from my controller  -->
                  <div class="card mt-4">
                     <div class="card-body">
                        <h5 class="card-title">{{$post->post_title}}</h5> <!-- extract the title -->
                        <p class="card-text">{{ $post->post_content }}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                     </div>
                     <img class="card-img-bottom" src="http://placehold.it/600x300" alt="Card image cap">
                     <a href="{{ url('update/' . $post->post_id) }}" class="mt-2 mb-2">Edit</a> <!-- i need to send post_id -->

                  </div>
                  @endforeach


                  <!-- pagination links -->
                  <div class= "mt-2 mb-2">
                      {{ $posts->links() }}
                  </div>
                 
               </div>
             
            

            <div class="col-md-4">
            <div class="card mt-4">
               <div class="card-header">
                  Featured
                  </div>
                     <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                     </div>
               </div>
            </div>
         </div>
      </div>

   <!-- end the posts section -->
  


 @endsection('content') <!-- end my section -->