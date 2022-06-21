@extends('layouts.admin')

@section('title')
    Register
@endsection

@section('content')
    <div class="main-container">
        <div classq="main-logo">
<<<<<<< HEAD
            <img src="{{ asset('assets/machips.png')}}">
=======
            <img src="https://bem.esqbs.ac.id/wp-content/uploads/2022/02/inovtek-highres.png">
>>>>>>> e64af6b (First Commit)
        </div>
        <h1>MaChips</h1>

        <form class="form-login" action="{{ route('auth.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container mt-5">
                <div class="row">
                                
                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Username</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
<<<<<<< HEAD
                            <input class="form-control form-control-sm" id="formFileSm" type="text" placeholder="ex: alvinabner" name="username" required> 
=======
                            <input class="form-control form-control-sm" id="formFileSm" type="text" placeholder="ex: alvinabner" name="username"> 
>>>>>>> e64af6b (First Commit)
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Password</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
<<<<<<< HEAD
                            <input type="password" class="form-control form-control-sm mb-3" placeholder="********" name="password" required>
=======
                            <input type="password" class="form-control form-control-sm mb-3" placeholder="********" name="password">
>>>>>>> e64af6b (First Commit)
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Email</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
<<<<<<< HEAD
                            <input type="email" class="form-control form-control-sm mb-3" placeholder="example1@gmail.com" name="email" required>
=======
                            <input type="email" class="form-control form-control-sm mb-3" placeholder="example1@gmail.com" name="email">
>>>>>>> e64af6b (First Commit)
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Nama</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group form-group-md mb-3">
<<<<<<< HEAD
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="ex: Alvin Abner" name="nama" required>
=======
                            <input type="text" class="form-control form-control-sm mb-3" placeholder="ex: Alvin Abner" name="nama">
>>>>>>> e64af6b (First Commit)
                        </div>
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Tanggal Lahir</label>
                    </div>
                    <div class="col-md-9">
<<<<<<< HEAD
                        <input type="date" class="form-control form-control-sm mb-3" placeholder="Year Release" name="ttl" required>
=======
                        <input type="date" class="form-control form-control-sm mb-3" placeholder="Year Release" name="ttl">
>>>>>>> e64af6b (First Commit)
                    </div>

                    @auth('user')
                        @if (Auth::guard('user')->user()->role == 'admin')
                            <div class="col-3 label-regis">
                                <label for="role" class="col-form-label-sm">Role</label>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control form-control-sm mb-3" name="role" id="role">
                                    <option value="">-SELECT OPTION-</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                        @endif
                    @endauth

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">Alamat</label>
                    </div>
                    <div class="col-md-9">
<<<<<<< HEAD
                        <textarea class="form-control form-control-sm mb-3" rows="2" id="comment" name="alamat" placeholder="ex: jalan, nomor rumah, kecamatan/kota, provinsi" required></textarea>
=======
                        <textarea class="form-control form-control-sm mb-3" rows="2" id="comment" name="alamat" placeholder="ex: jalan, nomor rumah, kecamatan/kota, provinsi"></textarea>
>>>>>>> e64af6b (First Commit)
                    </div>

                    <div class="col-3 label-regis">
                        <label for="" class="col-form-label-sm">No. HP</label>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group-sm mb-3">
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">+62</span>
<<<<<<< HEAD
                                <input type="text" class="form-control" placeholder="" name="phone" required>
=======
                                <input type="text" class="form-control" placeholder="" name="phone">
>>>>>>> e64af6b (First Commit)
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