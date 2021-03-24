<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Image uploader, meta data retriever">
        <meta name="keywords" content="Images, upload, csv, api">
        <meta name="author" content="David van Oudhesuden">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title> Berlinger - @yield('title') </title>
        <!-- Fevicon -->
        <!-- Start CSS -->  
        <link rel="stylesheet" href="https://getbootstrap.com/docs/5.0/examples/cover/cover.css">
    </head>
    <body class="d-flex h-100 text-center text-white bg-dark">
        @yield('content')
    </body>
</html>    