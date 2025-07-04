<?php

use App\Models\perusahaan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->foreignId('perusahaan_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('devisi_id')->nullable()->constrained()->onDelete('set null');
            $table->string('phone')->nullable();
            $table->text('alamat')->nullable();
            $table->enum('role', ['superadmin', 'admin', 'karyawan']);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
