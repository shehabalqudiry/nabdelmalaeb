<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration {

	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('image')->default('default.png');
			$table->text('body');
			$table->string('slug');
			$table->text('excerpt');
			$table->boolean('exclusive')->nullable()->default(false);
			$table->unsignedBigInteger('league_id');
			$table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('articles');
	}
}
