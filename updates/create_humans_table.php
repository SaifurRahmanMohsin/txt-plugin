<?php namespace Mohsin\Txt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateHumansTable extends Migration
{

    public function up()
    {
        Schema::create('mohsin_txt_humans', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('attribution');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mohsin_txt_humans');
    }

}
