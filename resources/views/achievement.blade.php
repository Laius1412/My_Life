@extends('layouts.app1')

@section('title', 'Memories')

@section('content')
<div class="container-fluid mt-5">
    <div class="row">
        <!-- Cột bên trái cho form thêm sự kiện -->
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Sự Kiện</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ isset($achievement) ? route('achievement.update', $achievement->id) : route('achievement.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(isset($achievement))
                            @method('PUT')
                        @endif
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Thời Gian</label>
                            <input type="date" class="form-control" id="eventDate" name="event_date" value="{{ isset($achievement) ? $achievement->event_date : '' }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDescription" class="form-label">Sự Kiện</label>
                            <textarea class="form-control" id="eventDescription" name="event_description" rows="3" required>{{ isset($achievement) ? $achievement->event_description : '' }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="eventImage" class="form-label">Ảnh</label>
                            <input type="file" class="form-control" id="eventImage" name="event_image" accept="image/*">
                        </div>
                        <button type="submit" class="btn bg-primary w-100">{{ isset($achievement) ? 'Cập Nhật' : 'Lưu' }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Cột bên phải cho danh sách thành tích đã lưu -->
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="card-title mb-0">Kỉ niệm </h4>
                </div>
                <div class="card-body" style="max-height: 80vh; overflow-y: auto;">
                    <div class="row">
                        @foreach($achievements as $achievement)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100">
                                    <img src="{{ $achievement->event_image }}" class="card-img-top event-image" alt="Achievement Image" onclick="openImageModal('{{ $achievement->event_image }}')">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $achievement->event_date }}</h5>
                                        <p class="card-text">{{ $achievement->event_description }}</p>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <a href="{{ route('achievement.edit', $achievement->id) }}" class="btn btn-warning btn-sm">Chỉnh Sửa</a>
                                            <form action="{{ route('achievement.destroy', $achievement->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
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
</div>

<!-- Modal hiển thị ảnh lớn -->
<div id="imageModal" class="image-modal" onclick="closeImageModal()">
    <span class="close">&times;</span>
    <img class="image-modal-content" id="fullImage">
</div>

<style>
    .event-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        cursor: pointer;
    }

    .image-modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
    }

    .image-modal-content {
        max-width: 80%;
        max-height: 80%;
        border-radius: 8px;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 25px;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<script>
    function openImageModal(imageSrc) {
        document.getElementById('fullImage').src = imageSrc;
        document.getElementById('imageModal').style.display = 'flex';
    }

    function closeImageModal() {
        document.getElementById('imageModal').style.display = 'none';
    }
</script>
@endsection
