@extends('admin.layout.app')

@section('main-content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to our dashboard</p>
                        @include('validate.validate')
                        <!-- Form -->
                        <form action="{{ route('admin.user.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="email" class="form-control" value="{{ old('email') }}" type="text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        
                        
                          
                       
                        <!-- /Social Login -->
                        
                        <div class="text-center dont-have">Don’t have an account? <a href="{{ route('admin.user.register.page') }}">Register</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection