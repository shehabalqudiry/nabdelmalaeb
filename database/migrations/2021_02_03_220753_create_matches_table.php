<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchesTable extends Migration {

	public function up()
	{
		Schema::create('matches', function(Blueprint $table) {
			$table->id();
			$table->bigInteger('league_id')->unsigned();
			$table->string('home_team', 255);
			$table->string('away_team');
			$table->string('timing');
            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues')
            ->onDelete('cascade')
            ->onUpdate('cascade');
		});
	}

	public function down()
	{

	Schema::drop('matches');
	}
}
