@extends('layouts.admin')

@section('title')
    Category
@endsection

@section('content')
    <div class="container">
        <div class='card'>
            <div class='card-header'>
                <div class="float-start">
                    Category
                </div>
                <div class="float-end">
                    <a class="btn btn-dark" href="{{ route('category.create') }}">Create New Category</a>
                </div>
            </div>
            <div class='card-body'>
                
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                    <tr>
                        <th>{{ $key+1 }}</th>
                        <td>{{ $category->code }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-primary">Edit</a>
                            <form
                                onsubmit="return confirm('Are you sure?')"
                                class="d-inline"
                                action="{{route('category.destroy', [$category->id])}}"
                                method="POST">
                                    @csrf
                                    <input
                                    type="hidden"
                                    name="_method"
                                    value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <br><br><br>
    </div>
@endsection