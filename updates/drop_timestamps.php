<?php namespace Mohsin\Txt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class DropTimestamps extends Migration
{

    public function up()
    {
        Schema::table('mohsin_txt_humans', function($table)
        {
            $table->dropTimestamps();
        });
        Schema::table('mohsin_txt_information', function($table)
        {
            $table->dropTimestamps();
        });
        Schema::table('mohsin_txt_robots', function($table)
        {
            $table->dropTimestamps();
        });
        Schema::table('mohsin_txt_directives', function($table)
        {
            $table->dropTimestamps();
        });
        Schema::table('mohsin_txt_agents', function($table)
        {
            $table->dropTimestamps();
        });
    }

    public function down()
    {
        Schema::table('mohsin_txt_humans', function($table)
        {
            $table->timestamps();
        });
        Schema::table('mohsin_txt_information', function($table)
        {
            $table->timestamps();
        });
        Schema::table('mohsin_txt_robots', function($table)
        {
            $table->timestamps();
        });
        Schema::table('mohsin_txt_directives', function($table)
        {
            $table->timestamps();
        });
        Schema::table('mohsin_txt_agents', function($table)
        {
            $table->timestamps();
        });
    }

}
