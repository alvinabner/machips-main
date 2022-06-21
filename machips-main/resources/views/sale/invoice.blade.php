@extends('layouts.admin')

@section('title')
    Halaman Pembayaran
@endsection
<style>
    .white-box{
        padding: 10px;
        border: solid 1px;
        background-color: #ffff;
        border-radius: 10px;
    }
</style>
@section('content')
<div class="container-fluid">
    <div class='card'>
        <div class='card-body'>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h1 class="m-t-0"><img src="{{ asset('assets/bca.png') }}" alt="" width="100px" height="45px"></h1>
                            <h2>322 0539 791</h2> <span class="pull-right">Expiry date: {{ now()->subDays(3)->format('d/m/y') }}</span> <span class="font-500">Deviska Adi Nugroho</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h1 class="m-t-0"><img src="{{ asset('assets/BRI.png') }}" alt="" width="100px" height="45px"></h1>
                            <h2>322 0539 791</h2> <span class="pull-right">Expiry date: {{ now()->subDays(3)->format('d/m/y') }}</span> <span class="font-500">Deviska Adi Nugroho</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h1 class="m-t-0"><img src="{{ asset('assets/bni.png') }}" alt="" width="100px" height="45px"></h1>
                            <h2>322 0539 791</h2> <span class="pull-right">Expiry date: {{ now()->subDays(3)->format('d/m/y') }}</span> <span class="font-500">Deviska Adi Nugroho</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h1 class="m-t-0"><img src="{{ asset('assets/mandiri.png') }}" alt="" width="100px" height="45px"></h1>
                            <h2>322 0539 791</h2> <span class="pull-right">Expiry date: {{ now()->subDays(3)->format('d/m/y') }}</span> <span class="font-500">Deviska Adi Nugroho</span>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <div class='card'>
        <div class='card-header'>
            Bukti Pembayaran <span class="badge badge-dark">{{$sale->ref_no}}</span>
        </div>
        <div class='card-body'>
            <form action='{{ route('buktiPembayaran') }}' method='POST' enctype='multipart/form-data'>
            @csrf
            <div class='form-group'>
                <label for=''>Upload Bukti Pembayaran</label>
                <input type="hidden" name="sale_id" value="{{$sale->id}}">
                <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div class='form-group'>
                <label for=''>Upload Bukti Pembayaran</label>
                <input type='file' class='form-control' name='file' id='' placeholder=''>
            </div>
            <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection