<x-layout>
    <div class="container my-3">
        <div class="row">
            <h1>Login Form</h1>
            <form
                action="/login"
                method="POST"
            >
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input
                        value="{{old('email')}}"
                        name="email"
                        type="email"
                        class="form-control"
                        id="exampleInputEmail1"
                        aria-describedby="emailHelp"
                        placeholder="Enter email"
                    >
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input
                        name="password"
                        type="password"
                        class="form-control"
                        id="exampleInputPassword1"
                        placeholder="Password"
                    >
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group my-3">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >Login</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>