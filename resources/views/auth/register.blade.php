@extends('layouts.app')
@section('title', 'Đăng ký')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-success text-white text-center py-3 rounded-top">
                <h4 class="mb-0">📝 Đăng Ký Tài Khoản</h4>
            </div>

            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Tên đăng nhập -->
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Tên đăng nhập</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                        </div>
                        @error('name')
                            <div class="text-danger mt-1"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Mật khẩu -->
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        </div>
                        @error('password')
                            <div class="text-danger mt-1"><strong>{{ $message }}</strong></div>
                        @enderror
                    </div>

                    <!-- Xác nhận mật khẩu -->
                    <div class="form-group mb-3">
                        <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="fas fa-key"></i></span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <!-- Nút đăng ký -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success btn-lg fw-bold">
                            <i class="fas fa-user-plus"></i> Đăng ký
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
