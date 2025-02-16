@extends('layouts.app1')

@section('title', 'Diary')

@section('content')
<div class="container">
    <div class="row">
        <!-- Phần trên: Chọn ngày và viết nhật ký -->
        <div class="col-md-4">
            <h2>Chọn ngày</h2>
            <input type="date" id="diary-date" class="form-control" onchange="loadDiary()">
        </div>
        <div class="col-md-8">
            <h2>Nhật ký</h2>
            <div class="card p-3 shadow-sm bg-white border-primary border-2">
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-outline-primary" onclick="changeDate(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h4 id="display-date" class="text-center"></h4>
                    <button class="btn btn-outline-primary" onclick="changeDate(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <form id="diary-form" action="{{ route('diary.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="date" id="selected-date">
                    <textarea name="content" id="diary-content" class="form-control mt-2" rows="5" placeholder="Hôm nay của bạn thế nào?"></textarea>
                    <button type="submit" class="btn btn-success mt-2">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                </form>
            </div>
        </div>
    </div>

    <hr style="border-top: 3px solid #007bff; margin-top: 30px; margin-bottom: 30px;"> <!-- Đường line màu xanh -->

    <div class="row">
        <!-- Phần dưới: Nhật ký đã viết -->
        <div class="col-md-6" style="max-height: 400px; overflow-y: auto;">
            <h3>Nhật ký đã viết</h3>
            <div class="list-group mt-2">
                @foreach($diaries->sortByDesc('date') as $diary)
                    <div class="list-group-item shadow-sm bg-white p-3 mb-2 border-primary border-2">
                        <h5 class="text-primary">{{ $diary->date }}</h5>
                        <button class="btn btn-primary btn-sm" onclick="viewDiary('{{ $diary->date }}')">
                            <i class="fas fa-eye"></i> Xem
                        </button>
                        <form action="{{ route('diary.destroy', $diary->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Xóa nhật ký
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 40px; max-height: 400px; overflow-y: auto;">
            <div class="card p-3 shadow-sm bg-white border-primary border-2" id="view-diary-card" style="display:none; height: 100%; overflow-y: auto;">
                <h4 id="view-diary-date"></h4>
                <p id="view-diary-content"></p>
            </div>
        </div>
    </div>
</div>

<script>
    let diaryEntries = @json($diaries);
    let dateInput = document.getElementById("diary-date");
    let displayDate = document.getElementById("display-date");
    let selectedDateInput = document.getElementById("selected-date");
    let contentTextarea = document.getElementById("diary-content");

    function loadDiary() {
        let selectedDate = dateInput.value;
        selectedDateInput.value = selectedDate;
        displayDate.innerText = selectedDate;

        let entry = diaryEntries.find(d => d.date === selectedDate);
        contentTextarea.value = entry ? entry.content : "";
    }

    function changeDate(offset) {
        let currentDate = new Date(dateInput.value || new Date());
        currentDate.setDate(currentDate.getDate() + offset);
        let newDate = currentDate.toISOString().split('T')[0];
        dateInput.value = newDate;
        loadDiary();
    }

    function viewDiary(date) {
        let entry = diaryEntries.find(d => d.date === date);
        if (entry) {
            document.getElementById("view-diary-date").innerText = entry.date;
            document.getElementById("view-diary-content").innerText = entry.content;
            document.getElementById("view-diary-card").style.display = "block";
        }
    }

    window.onload = () => {
        let today = new Date().toISOString().split('T')[0];
        dateInput.value = today;
        loadDiary();
    }
</script>
@endsection
