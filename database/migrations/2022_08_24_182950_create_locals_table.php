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
			$table->id('id_local');
			$table->string('name', 60);
			$table->string('address', 100);
			$table->string('opening_time');
			$table->string('closing_time');
			$table->string('url_site');
			$table->text('url_map');
			$table->string('phone', 25);
			$table->boolean('terms')->default(0);
			$table->boolean('is_favorite')->default(0);
			$table->string('image', 40);
			$table->string('image_alt', 40)->nullable();
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
