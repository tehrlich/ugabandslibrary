<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('works', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string('identifier');
			$table->string('composer')->nullable();
			$table->string('name');
			$table->string('arranger')->nullable();
			$table->string('editor')->nullable();
			$table->string('publisher')->nullable();
			$table->tinyInteger('grade')->nullable();
			$table->tinyInteger('oversizedScoreID')->nullable();
			$table->string('lastPerformedEnsemble')->nullable();
			$table->date('lastPerformedDate')->nullable();
			$table->string('notes')->nullable();
			$table->string('checkedOut')->nullable();
			$table->string('lastEditedBy');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('works');
	}

}
