<?php namespace Mohsin\Txt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateTxtParentIdsNullable extends Migration
{
    public function up()
    {
        Schema::table('mohsin_txt_directives', function ($table) {
            $table->integer('robot_id')->nullable()->change();
        });

        Schema::table('mohsin_txt_information', function ($table) {
            $table->integer('human_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('mohsin_txt_directives', function ($table) {
            $table->integer('robot_id')->nullable(false)->change();
        });

        Schema::table('mohsin_txt_information', function ($table) {
            $table->integer('human_id')->nullable(false)->change();
        });
    }
}
