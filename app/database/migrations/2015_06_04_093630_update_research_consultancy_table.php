<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateResearchConsultancyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('rnc_research_paper_comment', function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->text('comments');
            $table->integer('commented_to', false, 11);
            $table->integer('commented_by', false, 11);
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
        Schema::table('rnc_research_paper_comment', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
        });

        Schema::create('rnc_research_paper_beneficial', function(Blueprint $table)
        {
            $table->increments('id', true);
            $table->unsignedInteger('rnc_research_paper_id')->nullable();
            $table->unsignedInteger('writer_user_id')->nullable();
            $table->text('value');
            $table->integer('created_by', false, 11);
            $table->integer('updated_by', false, 11);
            $table->timestamps();
        });
        Schema::table('rnc_research_paper_beneficial', function($table) {
            $table->foreign('rnc_research_paper_id')->references('id')->on('rnc_research_paper');
            $table->foreign('writer_user_id')->references('id')->on('user');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('rnc_research_paper_comment');
        Schema::drop('rnc_research_paper_beneficial');

	}

}
