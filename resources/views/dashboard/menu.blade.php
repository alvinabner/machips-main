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

<div id="alert-success" class="alert alert-success text-success alert-dismissible" hidden>
    <strong>Berhasil</strong> Ditambahkan ke keranjang
</div>

<div id="alert-danger" class="alert alert-danger text-danger alert-dismissible" hidden>
    <strong>Gagal</strong> Ditambahkan ke keranjang
</div>

<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <img class="image-circle" src="{{ asset('storage/'.$product->avatar) }}">
                            <h3>MaChips</h3>
                            <h3>{{ $product->name }}</h3>
                            <button class="btn btn-dark" onclick="addCart(1, {{ $product->id }})"><i class="fa-solid fa-cart-shopping"></i> Tambah Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function addCart(qty, product_id, sale_id = null) {
        var postForm = {
            '_token'    : "{{ csrf_token() }}",
            'qty'       : qty,
            'product_id': product_id
        };

        $.ajax({
            url: '{{ route("addCart") }}', 
            type: 'POST', 
            data : postForm,
            dataType  : 'json',
        })
        .done(function(data) {
            $('#alert-success').removeAttr('hidden');
        })
        .fail(function() {
            $('#alert-danger').removeAttr('hidden');
        });
    }
</script>