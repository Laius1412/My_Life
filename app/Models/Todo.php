<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // Nếu tên bảng khác với tên Model (theo mặc định là số nhiều), chỉ định rõ tên bảng:
    protected $table = 'todos';

    // Các cột được phép thêm/sửa:
    protected $fillable = [
        'title',
        'description',
    ];
}
