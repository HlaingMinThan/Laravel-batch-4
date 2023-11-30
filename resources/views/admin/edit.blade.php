<x-admin-layout>
    <h1>Blog Edit</h1>
    <form
        action="/admin/blogs/{{$blog->id}}/update"
        method="POST"
    >
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Blog title</label>
            <input
                value="{{$blog->title}}"
                type="text"
                name="title"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter title"
            >
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Slug</label>
            <input
                value="{{$blog->slug}}"
                type="text"
                name="slug"
                class="form-control"
                id="exampleInputEmail1"
                aria-describedby="emailHelp"
                placeholder="Enter title"
            >
            @error('slug')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Body</label>
            <textarea
                name="body"
                class="form-control"
                cols="30"
                rows="10"
            >
            {{$blog->body}}
        </textarea>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Blog Category</label>
            <select
                name="cat_id"
                class="form-control"
                id=""
            >
                @foreach ($categories as $category)
                <option {{$category->id == $blog->category->id ? 'selected' : ''}}
                    value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('cat_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >Update</button>
    </form>
</x-admin-layout>