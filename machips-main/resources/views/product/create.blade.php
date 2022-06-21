@extends('layouts.admin')

@section('title')
    Create Product
@endsection

@section('content')
    <div class="main-container">
        <div classq="main-logo">
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
        </div>
        <h1>MaChips</h1>

        <form class="form-login" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Create Product</h3>
            <div class="container mt-5">
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="category_id" class="col-form-label-sm">Category</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <select class="form-control form-control-sm" name="category_id" id="category_id" required>
                                <option value="" selected disabled>-SELECT OPTION-</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="name" class="col-form-label-sm">Product Name</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="name" type="text" name="name" required> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="name" class="col-form-label-sm">Price</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="price" type="number" name="price" required> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="avatar" class="col-form-label-sm">Photo Product</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="avatar" type="file" name="avatar" required> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 label-regis">
                        <label for="desc" class="col-form-label-sm">Description</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <textarea class="form-control form-control-sm" name="desc" id="desc" cols="30" rows="3" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="login-button-container">
                <button class="login-button btn border" type="submit">Submit</button>
            </div>
        </form>

        <br><br><br>
    </div>
@endsection