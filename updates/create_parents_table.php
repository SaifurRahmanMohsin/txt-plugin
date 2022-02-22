<?php namespace Mohsin\Txt\Updates;

use Db;
use Schema;
use Mohsin\Txt\Models\ParentModel;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateParentsTable Migration
 */
class CreateParentsTable extends Migration
{
    public function up()
    {
        Schema::create('mohsin_txt_parents', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_robot')->default(false);
            $table->string('key')->unique();
        });

        // Move all existing robots to the parent model.
        $robots = DB::table('mohsin_txt_robots')->get();
        foreach ($robots as $robot) {
            $parent = new ParentModel;
            $parent->is_robot = true;
            $parent->key = $robot->agent;
            $parent->save();
        }
        Schema::drop('mohsin_txt_robots');

        // Move all existing humans to the parent model.
        $humans = DB::table('mohsin_txt_humans')->get();
        foreach ($humans as $human) {
            $parent = new ParentModel;
            $parent->is_robot = false;
            $parent->key = $human->attribution;
            $parent->save();
        }
        Schema::drop('mohsin_txt_humans');
    }

    public function down()
    {
        // Recreate the robots table.
        Schema::create('mohsin_txt_robots', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('agent');
        });

        // Move all existing robot txts out of the parent model.
        foreach (ParentModel::robots()->get() as $parent) {
            DB::table('mohsin_txt_robots')->insert([
                'agent' => $parent->key
            ]);
        }

        // Recreate the humans table.
        Schema::create('mohsin_txt_humans', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('attribution');
        });

        // Move all existing human txts out of the parent model.
        foreach (ParentModel::humans()->get() as $parent) {
            DB::table('mohsin_txt_humans')->insert([
                'attribution' => $parent->key,
            ]);
        }

        Schema::drop('mohsin_txt_parents');
    }
}
