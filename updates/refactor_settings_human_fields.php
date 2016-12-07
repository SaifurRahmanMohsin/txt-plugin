<?php namespace Mohsin\Rating\Updates;

use Mohsin\Txt\Models\Setting;
use October\Rain\Database\Updates\Seeder;

class RefactorSettingsHumanFields extends Seeder
{
    public function run()
    {
        $human_fields = Setting::get('human_fields');

        if(is_array($human_fields))
            return;

        $human_field = empty($human_fields) ? ['Team','Site','Thanks','Technology'] : array_map('trim', explode(',', $human_fields));

        $human_new_fields = array();
        foreach($human_field as $key => $value)
          $human_new_fields[$key] = array('human_field' => $value);

        Setting::set('human_fields', $human_new_fields);
    }
}
