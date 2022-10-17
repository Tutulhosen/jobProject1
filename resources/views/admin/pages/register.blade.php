@extends('admin.layout.app')

@section('main-content')
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to Your dashboard</p>
                        
                        @include('validate.validate')

                        <!-- Form -->
                        <form action="{{ route('admin.user.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="name" class="form-control" value="{{ old('name') }}" type="text" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input name="email" class="form-control" value="{{ old('email') }}"  type="text" placeholder="Email">
                            </div>
                            
                            <div class="form-group">
                                <input name="password" class="form-control"  type="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input name="password_confirmation" class="form-control" type="password" placeholder="Confirmation Password">
                            </div>
                           
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->
                        
                        
                        
                        <!-- Social Login -->
                        
                        <!-- /Social Login -->
                        
                        <div class="text-center dont-have">Already have an account? <a href="{{ route('admin.user.login.page') }}">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection