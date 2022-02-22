<?php namespace Mohsin\Txt\Updates;

use Db;
use Schema;
use Mohsin\Txt\Models\Child;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

/**
 * CreateChildrenTable Migration
 */
class CreateChildrenTable extends Migration
{
    public function up()
    {
        Schema::create('mohsin_txt_children', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_robot')->default(false);
            $table->integer('parent_id')->unsigned()->nullable()->index();
            $table->integer('position')->default(0);
            $table->string('field');
            $table->string('value');
            $table->boolean('new_line')->default(false);
        });

        // Move all existing directives to the child model.
        $directives = DB::table('mohsin_txt_directives')->get();
        foreach ($directives as $directive) {
            $child            = new Child;
            $child->is_robot  = true;
            $child->parent_id = $directive->robot_id;
            $child->position  = $directive->position;
            $child->field     = $directive->type;
            $child->value     = $directive->data;
            $child->new_line  = $directive->new_line;
            $child->save();
        }
        Schema::dropIfExists('mohsin_txt_directives');

        // Move all existing information to the child model.
        $information = DB::table('mohsin_txt_information')->get();
        foreach ($information as $information) {
            $child            = new Child;
            $child->is_robot  = false;
            $child->parent_id = $information->human_id;
            $child->position  = $information->position;
            $child->field     = $information->field;
            $child->value     = $information->value;
            $child->new_line  = $information->new_line;
            $child->save();
        }
        Schema::dropIfExists('mohsin_txt_information');
    }

    public function down()
    {
        // Recreate the directives table.
        Schema::create('mohsin_txt_directives', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('robot_id')->default(0)->nullable();
            $table->integer('position')->default(0);
            $table->string('type');
            $table->string('data');
            $table->boolean('new_line')->default(false);
        });

        // Move all existing directives txts out of the child model.
        foreach (Child::directives()->get() as $child) {
            DB::table('mohsin_txt_directives')->insert([
                'robot_id' => $child->parent_id,
                'position' => $child->position,
                'type'     => $child->field,
                'data'     => $child->value,
                'new_line' => $child->new_line
            ]);
        }

        // Recreate the information table.
        Schema::create('mohsin_txt_information', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('human_id')->default(0)->nullable();
            $table->integer('position')->default(0);
            $table->string('field');
            $table->string('value');
            $table->boolean('new_line')->default(false);
        });

        // Move all existing information txts out of the child model.
        foreach (Child::information()->get() as $child) {
            DB::table('mohsin_txt_information')->insert([
                'human_id' => $child->parent_id,
                'position' => $child->position,
                'field'    => $child->field,
                'value'    => $child->value,
                'new_line' => $child->new_line
            ]);
        }

        Schema::dropIfExists('mohsin_txt_children');
    }
}
