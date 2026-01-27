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
        
    Schema::create('banquats', function (Blueprint $table) {
            $table->id('banquet_id');
            $table->string('banquet_name');
            $table->text('banquet_address');  
            $table->string('banquet_image')->nullable();  
            $table->timestamps();

});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banquats');
    }
};
