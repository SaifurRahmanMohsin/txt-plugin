<?php namespace Mohsin\Txt\Tests;

use Mohsin\Txt\Models\Robot;
use Mohsin\Txt\Models\Human;
use Mohsin\Txt\Models\Directive;
use Mohsin\Txt\Models\Information;
use PluginTestCase;

class PluginTest extends PluginTestCase
{
    public function testCreateTxts()
    {
        // Test Robots Txt
        $robot = Robot::create(['key' => 'Bingbot']);
        $this->assertDatabaseHas('mohsin_txt_parents', [
            'key'      => 'Bingbot',
            'is_robot' => 1
        ]);

        $robot->directives()->add(Directive::create([
            'field' => 'Disallow',
            'value' => '/google'
        ]));
        $robot->directives()->add(Directive::create([
            'field'    => 'Sitemap',
            'value'    => 'ms-sitemap.xml',
            'new_line' => 1
        ]));

        $this->assertDatabaseHas('mohsin_txt_children', [
            'parent_id' => $robot->id,
            'field'     => 'Disallow',
            'value'     => '/google',
            'new_line'  => 0,
            'is_robot'  => 1
        ]);
        $this->assertDatabaseHas('mohsin_txt_children', [
            'parent_id' => $robot->id,
            'field'     => 'Sitemap',
            'value'     => 'ms-sitemap.xml',
            'new_line'  => 1,
            'is_robot'  => 1
        ]);

        // Test Humans Txt
        $team = Human::create(['key' => 'Team']);
        $this->assertDatabaseHas('mohsin_txt_parents', [
            'key'      => 'Team',
            'is_robot' => 0
        ]);

        $team->information()->add(Information::create([
            'field' => 'Developer',
            'value' => 'Mohsin'
        ]));

        $this->assertDatabaseHas('mohsin_txt_children', [
            'parent_id' => $team->id,
            'field'     => 'Developer',
            'value'     => 'Mohsin',
            'new_line'  => 0,
            'is_robot'  => 0
        ]);
    }
}
