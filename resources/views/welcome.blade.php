@extends('layouts.app1')

@section('title', 'Trang Chủ')

@section('content')
<div class="box">
    <div class="img-cover">
        <img src="{{ asset('img/avatar-default.jpg') }}" alt="Ava" class="img-ava">
    </div>
    @if (Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="social">
            Logout
        </a>
    @else
        <a href="{{ route('login') }}" class="social">Login</a>
        <a href="{{ route('register') }}" class="social">Register</a>
    @endif
    <a href="" target="_blank" class="social">
        <i class="fab fa-facebook-f"></i> Facebook
    </a>
    <a href="" target="_blank" class="social">
        <i class="fab fa-instagram"></i> Instagram
    </a>
    <a href="" class="social">
        <i class="fas fa-envelope"></i> Email
    </a>
    <a href="" target="_blank" class="social">
        <i class="fas fa-comments"></i> Zalo
    </a>
    <a href="" target="_blank" class="social">
        <i class="fab fa-github"></i> Github
    </a>
</div>
@endsection
