@extends('layouts.admin')

@section('title')
    Create Category
@endsection

@section('content')
    <div class="main-container">
        <div classq="main-logo">
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
        </div>
        <h1>MaChips</h1>

        <form class="form-login" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Create Category</h3>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="code" class="col-form-label-sm">Code</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="code" type="text" name="code" value="{{ $category }}" readonly> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="name" class="col-form-label-sm">Name</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="name" type="text" placeholder="ex: alvinabner" name="name"> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-button-container">
                <button class="login-button btn border" type="submit">Create Account</button>
            </div>
        </form>

        <br><br><br>
    </div>
@endsection