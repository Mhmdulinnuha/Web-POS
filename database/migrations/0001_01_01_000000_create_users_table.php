<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('store_name')->nullable();
            $table->text('address')->nullable();

            $table->enum('role', ['admin', 'kasir'])->default('admin');

            $table->rememberToken();
            $table->timestamps();

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->string('employee_id')->nullable()->unique();

            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

            $table->foreign('admin_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
