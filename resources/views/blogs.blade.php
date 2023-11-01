<x-layout>
    <div class="container">
        @foreach ($blogs as $blog)
        <h1><a href="/blogs/{{$blog->slug}}">{{$blog->title}}</a></h1>
        <p>{{$blog->body}}</p>
        @endforeach
    </div>
</x-layout>