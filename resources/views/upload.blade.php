@section('title')
Upload a file
@endsection

@extends('layouts.main')
@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="d-flex justify-content-center">Berlinger file upload</h3>
        </div>
    </header>

    <main class="px-3">
        <h1>Upload your file please</h1>
        <p class="lead">
            <form method="post" action="{{route('upload.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="inputFile" class="form-label">CSV files please</label>
                  <input type="file" class="form-control" id="inputFile" name="inputFile" aria-describedby="fileHelp">
                  <div id="fileHelp" class="form-text">We love imagess</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </p>
       
    </main>

    <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>
@endsection