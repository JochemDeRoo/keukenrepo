@extends('layouts.master')
@section('content')
      <h3 class="pb-3 mb-4 border-bottom">
         Keukens
      </h3>
      <div class="row">
         @if(count($posts) > 0)
         @foreach($posts as $post)
         <div class="col-md-6">
            <div class="card flex-md-row mb-4 shadow-sm h-md-250">
               <div class="card-body d-flex flex-column align-items-start">
                  <strong class="d-inline-block mb-2">Keuken</strong>
                  <h6 class="mb-0">
                     <a class="text-dark" href="/posts/{{$post->id}}">{{$post->title}}</a>
                  </h6>
                  <a href="/profile/{{$post->user_id}}" style="text-decoration: none; color: black;"><div class="mb-1 text-muted small">geschreven door {{$post->user->name}}</a>
               </div>
               <p class="card-text mb-auto"> {!! \Illuminate\Support\Str::limit($post->body ?? '',50,'...') !!}</p>
               <a class="btn btn-success btn-sm" href="/posts/{{$post->id}}">Lees meer</a>
               @Auth
                  <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();">
                     <i class="fas fa-heart"></i>
                  </a>
                  <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite', $post->id) }}" style="display: none;">
                     @csrf
                  </form>
               @endauth
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="" src="/storage/cover_images/{{$post->cover_image}}" style="width: 275px; height: 225px;">
         </div>
      </div>
      @endforeach
      @else
         <p>no posts found</p>
      @endif
      </div>
  
     <h3 class="mt-3 pb-3 mb-4 border-bottom">
        Keuken Nieuws
     </h3>
     <div class="row">
     <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Keukennieuws week 3 </h5>
                 <p class="card-text">In deze week bespreken we Keukennieuws nieuwe luxe keuken.</p>
                 <a href="#" class="btn btn-success btn-sm">Lees meer</a>
              </div>
           </div>
        </div>
        <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/1089077/pexels-photo-1089077.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Keukennieuws week 2 </h5>
                 <p class="card-text">In deze week bespreken we Keukennieuws nieuwste keuken.</p>
                 <a href="#" class="btn btn-success btn-sm">Lees meer</a>
              </div>
           </div>
        </div>
        <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/1251833/pexels-photo-1251833.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Keukennieuws week 1 </h5>
                 <p class="card-text">In deze week bespreken we Keukennieuws startup keuken.</p>
                 <a href="#" class="btn btn-success btn-sm">Lees meer</a>
              </div>
           </div>
        </div>
     </div>
  
     <h3 class="mt-3 pb-3 mb-4 border-bottom">
        Keukens voor jou
     </h3>
     <div class="row">
     <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/2724749/pexels-photo-2724749.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Moderne berkenhouten keukens</h5>
                 <p class="card-text">Hierin staan keukens die door klanten geadverteerd worden of gerelateerd zijn aan de klant zijn meest recent bekeken keukens.</p>
                 <a href="#" class="btn btn-success btn-sm">Meer info</a>
              </div>
           </div>
        </div>
        <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/1358900/pexels-photo-1358900.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Modern keukeneiland </h5>
                 <p class="card-text">Hierin staan keukens die door klanten geadverteerd worden of gerelateerd zijn aan de klant zijn meest recent bekeken keukens.</p>
                 <a href="#" class="btn btn-success btn-sm">Meer info</a>
              </div>
           </div>
        </div>
        <div class="col-md-4">
           <div class="card">
              <img class="card-img-top" src="https://images.pexels.com/photos/1080721/pexels-photo-1080721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Card image cap">
              <div class="card-body">
                 <h5 class="card-title border-bottom pb-3">Keuken Deluxe marmer wit</h5>
                 <p class="card-text">Hierin staan keukens die door klanten geadverteerd worden of gerelateerd zijn aan de klant zijn meest recent bekeken keukens.</p>
                 <a href="#" class="btn btn-success btn-sm">Meer info</a>
              </div>
           </div>
        </div>
     </div>
@endsection