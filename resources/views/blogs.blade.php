<x-layout>
    <div class="container">
        @foreach ($blogs as $blog)
        <h1><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
        <p>{{substr($blog->body,0,100)}}...</p>
        <p>Category - <a href="/categories/{{$blog->category->slug}}">{{$blog->category->name}}</a></p>
        <p>User - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a> </a></p>
        @endforeach
    </div>
</x-layout>