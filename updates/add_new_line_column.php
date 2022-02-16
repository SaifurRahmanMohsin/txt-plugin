<?php namespace Mohsin\Txt\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class AddNewLineColumn extends Migration
{
    public function up()
    {
        Schema::table('mohsin_txt_directives', function ($table) {
            $table->boolean('new_line')->default(false);
        });

        Schema::table('mohsin_txt_information', function ($table) {
            $table->boolean('new_line')->default(false);
        });
    }

    public function down()
    {
        Schema::table('mohsin_txt_directives', function ($table) {
            $table->dropColumn('new_line');
        });

        Schema::table('mohsin_txt_information', function ($table) {
            $table->dropColumn('new_line');
        });
    }
}
