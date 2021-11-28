@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form action="{{ route('login-user') }}" method="post">
                @csrf
                <h4>Login</h4>
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
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" 
                    class="form-control" 
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Enter email">
                    <span>@error('email')
                        {{ $message }}
                    @enderror</span>
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
                <a href="/register">Registration</a>
            </form>
        </div>
    </div>
</div>




@endsection