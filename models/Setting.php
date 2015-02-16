<?php namespace Mohsin\Txt\Models;

use Model;
use Cms\Classes\Page;

/**
 * Setting Model
 */
class Setting extends Model
{
    public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'mohsin_txt_settings';

    public $settingsFields = 'fields.yaml';

    public function getRedirectpageOptions($keyValue = null)
		{
		    return Page::getNameList();
		}
}