<x-admin-layout>
    <h1>Blogs list</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th
                    scope="col"
                    colspan="2"
                >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
            <tr>
                <th scope="row">{{$blog->id}}</th>
                <td>{{$blog->title}}</td>
                <td>{{$blog->slug}}</td>
                <td>{{$blog->category->name}}</td>
                <td><a
                        href="/admin/blogs/{{$blog->id}}/edit"
                        class="btn btn-link btn-warning"
                    >Edit</a></td>
                <td>
                    <form
                        action="/admin/blogs/{{$blog->id}}/destroy"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="btn btn-danger"
                        >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$blogs->links()}}
</x-admin-layout>