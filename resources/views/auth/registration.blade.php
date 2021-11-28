@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('register-user') }}" method="post">
                @csrf

                @if (Session::has('success'))  
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::has('fail'))  
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
            @endif



                <h4>Registration</h4>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" 
                    class="form-control"
                     placeholder="Enter full name"
                     name="name"
                    value="{{ old('name') }}"
                     >
                    <span>@error('name')
                        {{ $message }}
                    @enderror</span>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" 
                    name="email"
                    value="{{ old('email') }}" placeholder="Enter email">
                    <span>@error('email')
                        {{ $message }}
                    @enderror</span>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password"
                     class="form-control"
                     name="password"
                     value="{{ old('password') }}"
                     placeholder="Enter password">
                    <span>@error('password')
                        {{ $message }}
                    @enderror</span>
                </div>
                <button class="btn btn-block btn-primary", type="submit">Submit</button>
                <br>
                <a href="/login">Login</a>
            </form>
        </div>
    </div>
</div>




@endsection