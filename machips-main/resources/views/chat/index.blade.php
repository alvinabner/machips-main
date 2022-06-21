@extends('layouts.admin')

@section('title')
    Product
@endsection

@section('content')
    <div class="container">
        <div class='card'>
            <div class='card-header'>
                <div class="float-start">
                    Product
                </div>
                <div class="float-end">
                    <a class="btn btn-dark" href="{{ route('product.create') }}">Create New Product</a>
                </div>
            </div>
            <div class='card-body'>
                
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('chat.create', ['usr' => $user->name]) }}" class="btn btn-primary">Message</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br><br>
    </div>
@endsection