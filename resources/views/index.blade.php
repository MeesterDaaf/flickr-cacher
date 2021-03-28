@section('title')
Show all the data
@endsection

@extends('layouts.main')
@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
        <div>
            <h3 class="d-flex justify-content-center">All the data in tha house</h3>
        </div>
    </header>
    <a href="{{route('upload.create')}}" class="text-warning mb-2">Upload a file</a>
    <table class="table table-responsive table-striped  table-bordered text-dark bg-white"  >
        <tr>
            <th>
                id
            </th>
            <th>
                title
            </th>
            <th>
                url
            </th>
            <th>
                description
            </th>
        </tr>
        @foreach ($image_data as $item)
            <tr>
                <th  scope="row">
                    {{$item->id}}
                </th>
                <td>
                    {{$item->title}}
                </td>
                <td>
                    {{$item->url}}
                </td>
                <td>
                    {{$item->description}}
                </td>
                <td>
                    <a href="{{route('show', $item)}}" class="btn btn-success">Show</a>
                </td>
                
            </tr>
            @endforeach
    </table>
  
    <footer class="mt-auto text-white-50">
        <p>Cover template for <a href="https://getbootstrap.com/" class="text-white">Bootstrap</a>, by <a href="https://twitter.com/mdo" class="text-white">@mdo</a>.</p>
    </footer>
</div>
@endsection