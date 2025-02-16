@extends('layouts.app1')

@section('title', 'Time Table')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title">
                <i class="fas fa-calendar-alt"></i> Thời gian biểu
            </h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('time-table.store') }}" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="table-primary">
                            <tr>
                                <th>Thời gian</th>
                                <th>Thứ 2</th>
                                <th>Thứ 3</th>
                                <th>Thứ 4</th>
                                <th>Thứ 5</th>
                                <th>Thứ 6</th>
                                <th>Thứ 7</th>
                                <th>Chủ nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary">Sáng</td>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <td>
                                        <textarea name="timetable[{{ $day }}][morning]" class="form-control" rows="3">{{ $timetable[$day]->morning ?? '' }}</textarea>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="table-secondary">Chiều</td>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <td>
                                        <textarea name="timetable[{{ $day }}][afternoon]" class="form-control" rows="3">{{ $timetable[$day]->afternoon ?? '' }}</textarea>
                                    </td>
                                @endforeach
                            </tr>
                            <tr>
                                <td class="table-secondary">Tối</td>
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <td>
                                        <textarea name="timetable[{{ $day }}][evening]" class="form-control" rows="3">{{ $timetable[$day]->evening ?? '' }}</textarea>
                                    </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Lưu thời gian biểu
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
