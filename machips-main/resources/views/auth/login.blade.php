@extends('layouts.admin')

@section('title')
    Login
@endsection

@section('content')
    <div class="main-container">
        <div class="main-logo">
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
        </div>
        <h1>MaChips</h1>
        <h2>WELCOME</h2>
        <form class="form-login" action="{{ route('auth.login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="text" class="form-control" id="validationEmail" placeholder="example1@gmail.com" name="email" required>
                    <div class="invalid-feedback">
                        Email must be filled.
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" class="form-control" id="validationPassword" placeholder="********" name="password" required>
                    <div class="invalid-feedback">
                        Password must be filled.
                    </div>
                </div>
            </div>
            <div class="login-button-container">
                <button class="login-button btn border" type="submit">Login</button>
            </div>
        </form>

        <br><br>
        <div class="createacc-button-container">
            <a class="createacc-button btn" type="submit" href="{{ route('auth.create') }}">Create Account</button>
        </div>
    </div>
@endsection