@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
<div class="box">
    <div class="img-cover">
        <img src="{{ asset('img/avatar.png') }}" alt="Ava" class="img-ava">
    </div>
    <a href="https://www.facebook.com/laius1108" target="_blank" class="social">
        <i class="fab fa-facebook-f"></i> Facebook
    </a>
    <a href="https://www.instagram.com/laius4teen/" target="_blank" class="social">
        <i class="fab fa-instagram"></i> Instagram
    </a>
    <a href="https://mail.google.com/mail/u/0/#inbox" class="social">
        <i class="fas fa-envelope"></i> Email
    </a>
    <a href="https://zalo.me" target="_blank" class="social">
        <i class="fas fa-comments"></i> Zalo
    </a>
    <a href="https://github.com/Laius1412" target="_blank" class="social">
        <i class="fab fa-github"></i> Github
    </a>
</div>
@endsection
