<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
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
			$table->foreignId('neighborhood_id')->constrained('neighborhoods')->after('user_id')->onDelete('cascade');
			$table->string('name');
			$table->string('address');
			$table->string('opening_time');
			$table->string('closing_time');
			$table->string('url_site');
			$table->text('url_map');
			$table->string('phone');
			$table->boolean('terms')->default(0);
			$table->boolean('is_favorite')->default(0);
			$table->string('image');
			$table->string('image_alt')->nullable();
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
