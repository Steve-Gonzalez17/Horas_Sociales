<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });


        DB::table('users')->insert([
            'name' => 'Cruz',
            'lastname' => 'Roja',
            'username' => 'admin',
            'password' => bcrypt('123'), // Asegúrate de hashear la contraseña
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }


    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};