<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        // Kolom ini akan berisi ID si Admin yang membuat akun kasir ini
        $table->foreignId('admin_id')->nullable()->constrained('users')->onDelete('cascade');
        
        // Kolom tambahan untuk ID Pegawai (KSR-XXX) agar unik secara tampilan
        $table->string('employee_id')->nullable()->unique();
        
        // Status aktif kasir
        $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
    });
}
};
