<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->after('id')->onDelete('cascade');
            $table->string('name');
            $table->string('street');
            $table->string('street-number');
            $table->string('phone');
            $table->foreignId('neighborhood_id')->constrained('neighborhoods')->after('user_id')->onDelete('cascade');
            $table->text('map');
            $table->string('website');
            $table->text('description');
            $table->string('cover-photo');
            $table->string('certificate');
            $table->json('social-networks'); // Facebook, Instagram, TikTok
            $table->json('schedules');
            $table->boolean('terms')->default(0);
            $table->boolean('is_favorite')->default(0);
            $table->boolean('is_public')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
};
