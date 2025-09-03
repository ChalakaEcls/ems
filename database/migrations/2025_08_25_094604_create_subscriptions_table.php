<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_subscriptions_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['student_id', 'class_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
};