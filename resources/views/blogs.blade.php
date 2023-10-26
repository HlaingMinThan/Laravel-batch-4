<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>Document</title>
    <link
        rel="stylesheet"
        href="/style.css"
    >
</head>

<body>
    <div class="container">
        <h1>All Blogs</h1>
        @foreach ($blogs as $blog)
        <div class="{{$loop->even ? 'bg-green' : '' }}">
            <h1><a href="/blogs/{{$blog->slug}}">
                    {{$blog->title}}
                </a></h1>
            <p>
                {{$blog->body}}
            </p>
        </div>
        @endforeach
    </div>
</body>

</html>