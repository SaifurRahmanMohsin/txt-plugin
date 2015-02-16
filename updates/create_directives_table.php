<?php namespace Mohsin\Txt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateDirectivesTable extends Migration
{

    public function up()
    {
        Schema::create('mohsin_txt_directives', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('robot_id')->default(0);
            $table->integer('position')->default(0);
            $table->string('type');
            $table->string('data');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohsin_txt_directives');
    }

}
