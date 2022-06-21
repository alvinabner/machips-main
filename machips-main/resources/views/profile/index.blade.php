@extends('layouts.admin')

@section('title')
    Profile
@endsection

@section('content')
    <div class="main-container">
        <div classq="main-logo">
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
        </div>
        <h1>MaChips</h1>

        <form class="form-login" action="{{ route('auth.update', [Auth::guard('user')->user()->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mt-5">
                <div class="row">
                                
                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Username</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input class="form-control form-control-sm" id="formFileSm" type="text" placeholder="ex: alvinabner" name="username" value="{{ $user->username }}"> 
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Password <small>*only change</small></label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input type="password" class="form-control form-control-sm mb-3" placeholder="********" name="password">
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Email</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input type="email" class="form-control form-control-sm mb-3" placeholder="example1@gmail.com" name="email" value="{{ $user->email }}">
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="ex: Alvin Abner" name="nama" value="{{ $user->name }}">
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-9">
                        <input type="date" class="form-control form-control-sm mb-3" placeholder="Year Release" name="ttl" value="{{ $user->ttl }}">
                    </div>


                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Alamat</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control form-control-sm mb-3" rows="2" id="comment" name="alamat" placeholder="ex: jalan, nomor rumah, kecamatan/kota, provinsi">{{ $user->alamat }}</textarea>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">No. HP</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group-sm mb-3">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">+62</span>
                                <input type="text" class="form-control" placeholder="" name="phone" value="{{ $user->phone }}">
                            </div>
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