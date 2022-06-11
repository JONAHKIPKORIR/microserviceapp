@extends('app');

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h3>Registration</h3>
                <hr>
                <form action="{{ route('register_user') }}" method="POST">
                @if(Session::has('success'))
                <p class="alert alert-success"> {{Session::get('success')}}</p>
                @endif
                @if(Session::has('fail'))
                <p class="alert alert-danger"> {{Session::get('fail')}}</p>
                @endif

                    @csrf
                    <div class="form-group">    
                        <label for="firstname">First Name</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Enter firstName" value="{{old('firstname')}}">
                        <p class="text-danger">@error('firstname') {{$message}}  @enderror </p>
                    </div>

                    <div class="form-group">    
                        <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Enter lastName" value="{{old('lastname')}}">
                        <p class="text-danger">@error('lastname') {{$message}}  @enderror </p>
                    </div>

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
                        <button type="submit" name="register" class="btn  btn-primary">Register</button>

                    </div>

                    <br>

                    <p>Already Registered?  <a style="background: cadetblue" href="{{route('login')}}">Login Here</a></p>
                </form>
            </div>
        </div>
    </div>
</body>