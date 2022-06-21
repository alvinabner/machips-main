@extends('layouts.admin')

@section('title')
    Create Product
@endsection

@section('content')
    <style>
        .main-container{
            margin: 20px 50px !important;
        }
        .media-body{
            background-color: #E5E5E5;
            border-radius: 10px;
        }
        div.scroll {
            height: 180px;
            overflow: scroll;
        }
    </style>

    <div class="main-container">
        <div classq="main-logo">
            <img src="{{ asset('assets/inovtek-highres.png') }}" width="100px">
        </div>
        <h1>MaChips</h1>

        <form class="form-login" action="{{ route('chat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Chat</h3>
            <div class="container mt-5">
                <div class="scroll">
                    @foreach ($chats as $chat)
                        @if ($chat->message_admin)
                            <div class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <a href="#">
                                            <img alt="Profile Picture" src="{{ asset('assets/inovtek-highres.png')}}" class="media-object"/>
                                        </a>
                                    </a>
                                </div>
                                <div class="media-body text-left p-5">
                                    <span class="media-status online"></span>
                                    <h5 class="media-heading">{{ $user->name }}
                                        <span>{{ $chat->created_at->diffForHumans() }}</span>
                                    </h5>
                                    {{ $chat->message_admin }}
                                </div>
                            </div>
                        @endif
                        @if($chat->message_user)
                            <div class="media">
                                <div class="media-body text-right p-5">
                                    <span class="media-status offline"></span>
                                    <h5 class="media-heading">{{ Auth::guard('user')->user()->name }}
                                        <span>{{ $chat->created_at->diffForHumans() }}</span>
                                    </h5>
                                    {{ $chat->message_user }}
                                </div>
                                <div class="media-right">
                                    <a href="#">
                                        <img alt="Profile Picture" src="{{ asset('assets/inovtek-highres.png')}}" class="media-object"/>
                                    </a>
                                </div>
                            </div>                        
                        @endif
                    @endforeach
                </div>
                {{-- SEND MESSAGE --}}
                <div class="input-group text-center mt-5">
                    <div class="col-sm-10">
                        <div class="form-group form-group-md mb-3">
                            @if (Auth::guard('user')->user()->role == 'admin')
                                <input type="hidden" value="{{ $user->id }}" name="user_id">
                                <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="admin_id">
                                <textarea class="form-control form-control-sm" name="message_admin" id="message_admin" cols="30" rows="2" required></textarea>
                            @elseif (Auth::guard('user')->user()->role == 'user')
                                <input type="hidden" value="{{ Auth::guard('user')->user()->id }}" name="user_id">
                                <input type="hidden" value="{{ $user->id }}" name="admin_id">
                                <textarea class="form-control form-control-sm" name="message_user" id="message_user" cols="30" rows="2" required></textarea>
                            @endif
                        </div>
                    </div>
                    <button class="login-button btn border" type="submit">Send</button>
                </div>
            </div>
        </form>

        <br><br><br>
    </div>
@endsection