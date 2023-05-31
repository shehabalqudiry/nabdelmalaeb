<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaguesTable extends Migration {

	public function up()
	{
		Schema::create('leagues', function(Blueprint $table) {
			$table->id();
			$table->string('name', 255);
			$table->text('desc')->nullable();
			$table->bigInteger('category_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::drop('leagues');
	}
}