@extends('layouts.admin')

@section('title')
    Login
@endsection

@section('content')
    <div class="main-container">
        <div class="main-logo">
<<<<<<< HEAD
            <img src="{{ asset('assets/machips.png')}}">
=======
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
>>>>>>> e64af6b (First Commit)
        </div>
        <h1>MaChips</h1>
        <h2>WELCOME</h2>
        <form class="form-login" action="{{ route('auth.login') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">
<<<<<<< HEAD
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                        </svg>
=======
                        <i class="bi bi-envelope"></i>
>>>>>>> e64af6b (First Commit)
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
<<<<<<< HEAD
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
                            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                        </svg>                    
=======
                        <i class="bi bi-lock"></i>
>>>>>>> e64af6b (First Commit)
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