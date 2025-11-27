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

    $table->string('name');
    $table->text('address');
    
    // Multiple images/videos stored as array/JSON
    $table->json('images')->nullable();
    $table->json('videos')->nullable();

    // Additional useful fields
    $table->string('city')->nullable();
    $table->integer('capacity')->nullable();     // how many people
    $table->decimal('min_price', 10, 2)->nullable();
    $table->decimal('max_price', 10, 2)->nullable();

    // Contact info
    $table->string('contact_person')->nullable();
    $table->string('contact_phone', 20)->nullable();
    $table->string('contact_email')->nullable();

    // Active / inactive status
    $table->boolean('status')->default(1);

    $table->timestamps();
    $table->softDeletes(); // deleted_at column
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
