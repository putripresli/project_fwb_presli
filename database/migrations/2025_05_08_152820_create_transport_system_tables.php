<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportSystemTables extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    public function up()
    { 
        // 2. TABEL DRIVERS
        // ========================================
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('rental_name')->nullable();
            $table->text('address')->nullable();
            $table->timestamps();
        });

        // ========================================
        // 3. TABEL VEHICLES
        // ========================================
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade');
            $table->string('name');
            $table->string('plate_number')->unique();
            $table->integer('capacity');
            $table->decimal('price_per_day', 10, 2);
            $table->text('description')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('status', ['tersedia', 'disewa'])->default('tersedia');
            $table->timestamps();
        });

        // ========================================
        // 4. TABEL RENTALS
        // ========================================
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('total_price', 10, 2);
            $table->enum('status', ['pending', 'paid', 'canceled'])->default('pending');
            $table->timestamps();
        });

        // ========================================
        // 5. TABEL PAYMENTS
        // ========================================
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')->constrained('rentals')->onDelete('cascade');
            $table->string('payment_method')->default('BRIVA');
            $table->timestamp('payment_time')->useCurrent();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->timestamps();
        });

        // ========================================
        // 6. TABEL MESSAGES (Many-to-Many role-aware)
        // ========================================
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->enum('sender_role', ['user', 'driver', 'admin']);
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade');
            $table->enum('receiver_role', ['user', 'driver', 'admin']);
            $table->text('message');
            $table->timestamp('sent_at')->useCurrent();
            $table->timestamps();
        });

        // Optional: INDEX untuk pencarian lebih cepat
        Schema::table('messages', function (Blueprint $table) {
            $table->index(['sender_id', 'sender_role']);
            $table->index(['receiver_id', 'receiver_role']);
        });
    }

    /**
     * Balikkan migration.
     *
     * @return void
     */
    public function down()
    {
        // Drop tables in reverse order to maintain integrity
        Schema::dropIfExists('users');
        Schema::dropIfExists('drivers');
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('rentals');
        Schema::dropIfExists('payments');
        // Schema::dropIfExists('messages');
    }
}
