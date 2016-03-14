<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class Projects extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		// blog table
		Schema::create('projects', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title')->unique();;
      		$table->string('client_name');
			$table->string('client_adresse');
			$table->string('client_mail');
			$table->string('client_phone');
			$table->string('contact_name');
			$table->string('contact_adresse');
			$table->string('contact_mail');
			$table->string('contact_phone');
            $table->string('client_info');
            $table->string('project_type');
            $table->string('context');
            $table->string('need');
            $table->string('goals');
            $table->string('more_infos');
      		$table->boolean('active');
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
		// drop blog table
		Schema::drop('projects');
	}
}
