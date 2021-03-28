@section('title')
Show all the data
@endsection

@extends('layouts.main')
@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="d-flex justify-content-center">Berlinger image</h3>
        </div>
    </header>

    <main class="px-3">
       
       <img src="{{asset('/'. $image->image)}}" alt="" width="500">
       <div class="row">
           <div class="col">
               {{$image->title}}
           </div>
           <div class="col">
               {{$image->description}}
           </div>
       </div>
       <div class="row">
        <div class="col">
            {{$image->owner}}
        </div>
        <div class="col">
            {{$image->location}}
        </div>
        <div class="row">
            <div class="col">
                {{$image->views}} views
            </div>
            <div class="col">
                {{$image->date_taken}}
            </div> 
        </div>
        <div class="row">
            <div class="col">
                {{$photo_data}}
            </div>
        </div>
       
    </main>

    <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>
@endsection