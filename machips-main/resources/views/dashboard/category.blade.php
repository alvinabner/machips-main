@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
<style>
    .card{
        background: linear-gradient(1deg, #E5E5E5 60%, #fdcc3b00 60%);
    }
    .image-circle{
        border-radius: 50%;
        width: 150px;
        height: 150px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-3 mb-4">
                <a href="{{ route('product.category', [$category->id]) }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                {{-- <img class="image-circle" src="{{ asset('storage/'.$category->avatar) }}"> --}}
                                <img class="image-circle" src="{{ asset('assets/inovtek-highres.png') }}">
                                <h3>MaChips</h3>
                                <h3>{{ $category->name }}</h3>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection