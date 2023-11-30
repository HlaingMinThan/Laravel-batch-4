<x-admin-layout>
    <h1>Blog create</h1>
    <form
        action="/admin/blogs/store"
        method="POST"
    >
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Blog title</label>
            <input
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
            ></textarea>
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
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('cat_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >Create</button>
    </form>
</x-admin-layout>