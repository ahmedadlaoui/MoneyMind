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
        Schema::create('Goals', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('description');
            $table->foreignId('user_id');
            $table->integer('targetprice');
            $table->integer('contribution');
            $table->boolean('is_achieved')->default(false);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
