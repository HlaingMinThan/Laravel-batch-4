<x-layout>
    <div class="container">
        <h1><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
        <p>{{$blog->body}}</p>
    </div>
</x-layout>