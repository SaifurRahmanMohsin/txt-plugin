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

    /**
     * Sets human_fields field to default when empty.
     *
     * @return void
     */
    public function afterFetch()
    {
        if($this -> human_fields == "")
          $this -> human_fields ='Team, Site, Thanks, Technology';
    }

    /**
     * Returns the list of CMS pages.
     *
     * @return array
     */
    public function getRedirectpageOptions($keyValue = null)
    {
        return Page::getNameList();
    }
}
