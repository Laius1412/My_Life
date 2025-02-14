<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Thêm cột 'evening' vào bảng 'time_tables'
        Schema::table('time_tables', function (Blueprint $table) {
            $table->text('evening')->nullable(); // Thêm cột evening
        });
    }

    public function down()
    {
        // Xóa cột 'evening' nếu cần thiết
        Schema::table('time_tables', function (Blueprint $table) {
            $table->dropColumn('evening');
        });
    }
}; 