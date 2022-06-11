@extends('app');

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3>Login</h3>
                <hr>
                <form action="{{ route('user_login')}}" method="POST">
                @if(Session::has('success'))
                <p class="alert alert-success"> {{Session::get('success')}}</p>
                @endif
                @if(Session::has('fail'))
                <p class="alert alert-danger"> {{Session::get('fail')}}</p>
                @endif
                    @csrf
                    <div class="form-group">    
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email" value="{{old('email')}}">
                        <p class="text-danger">@error('email') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <label for="password">Password</label>
                        <input type=password" name="password" class="form-control" placeholder="Enter password" value="{{old('password')}}">
                        <p class="text-danger">@error('password') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <button type="submit" name="login" class="btn  btn-success">Login</button>
                    </div>

                    <br>

                    <p>Not Registered?  <a href="{{route('registration') }}">Register Here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>