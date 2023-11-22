<x-layout>

    <div class="container">
        <h3>Comment Edit</h3>
        <form
            action="/comments/{{$comment->id}}/update"
            method="POST"
        >
            @csrf
            @method('patch')
            <textarea
                placeholder="comment here..."
                class="form-control"
                name="body"
                id=""
                cols="30"
                rows="10"
            >{{$comment->body}}</textarea>
            @error('body')
            <div class="text-danger">{{$message}}</div>
            @enderror

            <button
                class="mt-3 btn btn-primary"
                type="submit"
            >Update</button>
        </form>
    </div>
</x-layout>