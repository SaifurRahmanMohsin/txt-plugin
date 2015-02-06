<?php namespace Mohsin\Txt\Models;

use Model;

/**
 * Setting Model
 */
class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'mohsin_txt_settings';

    public $settingsFields = 'fields.yaml';
}