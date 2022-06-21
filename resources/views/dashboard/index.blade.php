@extends('layouts.admin')

@section('title')
    Halaman Pembayaran
@endsection
<style>
    .white-box{
        padding: 15px;
        border: solid 1px;
        background-color: #ffff;
        border-radius: 10px;
        height: 130px;
    }
    .icon-large{
        float: left;
        color: rgb(3, 3, 3);
        font-size: 100;
    }
    .title{
        color: rgb(139, 180, 228);
        font-size: 25;
    }
    .badge{
        border-radius: 15px !important;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class='card'>
        <div class='card-body'>
                <div class="row mb-5">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="icon-large">
                                <i class="fas fa-money-check-dollar"></i>
                            </div>
                            <div class="float-right text-right pt-4">
                                <h1 class="title">Product Terjual</h1>
                                <h2>{{ $prod_sale }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="icon-large">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="float-right text-right pt-4">
                                <h1 class="title">Pendapatan</h1>
                                <h2>Rp.{{ number_format($grandTotal) }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="icon-large">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="float-right text-right pt-4">
                                <h1 class="title">Customer</h1>
                                <h2>{{ $customer }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <div class="icon-large">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <div class="float-right text-right pt-4">
                                <h1 class="title">Rata-rata Penjualan</h1>
                                <h2>Rp.{{ number_format($avg) }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
                
                <h1>List Order <span class="badge badge-success">Selesai</span></h1>
                <div class='card'>
                    <div class='card-body'>
                        @foreach ($sales as $id => $sale)
                            <div class="accordion" id="accordionExample{{$id}}">
                                <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne{{$id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$id}}" aria-expanded="true" aria-controls="collapseOne{{$id}}">
                                        @php
                                            $s = \App\Models\Sale::findOrFail($id);
                                        @endphp
                                        {{$s->ref_no}}
                                    </button>
                                </h2>
                                <div id="collapseOne{{$id}}" class="accordion-collapse collapse" aria-labelledby="headingOne{{$id}}" data-bs-parent="#accordionExample{{$id}}">
                                    <div class="accordion-body">
<<<<<<< HEAD
=======
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->username }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Name</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td>TTL</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->ttl }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td>:</td>
                                                    <td>{{ $s->user->email }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
>>>>>>> e64af6b (First Commit)
                                        <table class="table table-striped mt-4 table-centered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th class="text-right">Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sale as $key => $ps)
                                                    <tr id="data">
                                                        <td>
                                                            {{ $key+1 }}
                                                        </td>
                                                        <td>
                                                            {{ $ps->product->name }}
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="product_id[]" value="{{$ps->product_id}}">
                                                            <input type="hidden" name="id[]" value="{{$ps->id}}">
                                                            {{ $ps->qty }}
                                                        </td>
                                                        <input type="hidden" name="price[]" value="{{$ps->total}}">
                                                        <td class="text-right">Rp.{{ number_format($ps->total) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot align="right">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th>Grand Total</th>
                                                    <th class="text-right">Rp.{{number_format($s->grand_total)}}</th>
                                                </tr>
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th>
                                                        <form action='{{ route('sale.update', [$id]) }}' method='POST' enctype='multipart/form-data'>
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn btn-info">JOB</button>
                                                        </form>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        @if ($s->ulasan)
                                            <table class="table">
                                                <tr>
                                                    <th>Ulasan</th>
                                                    <td>{{ $s->ulasan->ulasan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Rating</th>
                                                    <td>{{ $s->ulasan->rating }}</td>
                                                </tr>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection