<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVideosTable extends Migration {

	public function up()
	{
		Schema::create('videos', function(Blueprint $table) {
			$table->id();
			$table->string('title', 255);
			$table->text('desc')->nullable();
			$table->text('youtube_url');
			$table->string('slug');
			$table->bigInteger('league_id')->unsigned();
            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues')
            ->onDelete('cascade')
            ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('videos');
	}
}
